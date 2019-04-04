<?php

class Persona
{
 #Atributos

 private $_nombre;
 private $_apellido;

 #constructor
 public function __construct($nombre,$apellido)
 {
     $this->_nombre=$nombre;
     $this->_apellido=$apellido;
 }


 #Metodos

 public function Guardar() #bool
 {
  $retorno =false;

  //abro el archivo en modo "a"
  $ar = fopen("Archivos/Persona.txt","a");

  //obtengo los datos de la persona
 $dato= $this->ToString();

 //guardo los datos de persona mas un salto de linea en el archivo
 $flag =fwrite($ar,$dato."\r\n");

 //valido que se haya escrito
 if($flag>0)
  {
    $retorno=true;
  }

  //cierro el archivo
 fclose($ar); 
 
 return $retorno;
 }



 public function Leer()
 {
     //abro el archivo en modo "r"
    $ar= fopen("Archivos/Persona.txt","r");
    
    //leo linea por linea el archivo
    while(!feof($ar))
    {
        echo fgets($ar)."<br>";
    }
 
    fclose($ar);
 }


 public function ToString()
 {
     return $this->_nombre."-".$this->_apellido;
 }


 /*Voy a traer todas las personas que estan en el Personas.txt para eso voy a tener en cuenta el nombre y el apellido
 que estan separados por un "-" y los voy a guardar a cada persona en un array de personas y lo retornop luego
 */
 public static function TraerTodasLasPersonas()
 {
     $retorno=array();

     //abro  el archivo en modo lectura
    $ar = fopen("Archivos/Persona.txt","r");

    //leo linea por linea
   // while(!feof($ar))
   
    while(!feof($ar))
    {
      $cadena = fgets($ar);
     
      //valido que la cadena no sea el ultimo salto de linea y que tenga "datos" y no un "<br>" 
      if($cadena=="")
      {
          continue;
      }
      //divido la cadena a partir del "-" me queda en la posicion "0" el nombre y en la posicion "1" el apellido 
      $dividido= explode("-",$cadena);
      //en el [2]voy a tener el \r\n
     $Persona=new Persona($dividido[0],$dividido[1]);

        //guardo la persona dentro del array
        array_push($retorno,$Persona);
      
    }
    
    fclose($ar); 

     return $retorno;

 }

}

?>