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

  $ar = fopen("Archivos/Persona.txt","a");


 //$fecha =date("r");

 //$dato= $fecha . $this->ToString();
 $dato= $this->ToString();

 $flag =fwrite($ar,$dato."\r\n");
 if($flag>0)
  {
    $retorno=true;
  }

 fclose($ar); 
 
 return $retorno;
 }

 public function Leer()
 {
    $ar= fopen("Archivos/Persona.txt","r");

    while(!feof($ar))
    {
        echo fgets($ar)."<br>";
    }

    fclose($ar);
 }

 public function ToString()
 {
     return $this->_nombre ."-".$this->_apellido;
 }

 public static function TraerTodasLasPersonas()
 {
     $retorno=array();

    $ar = fopen("Archivos/Persona.txt","r");

    while(!feof($ar))
    {
      $cadena = fgets($ar);
     
      //en el [2]voy a tener el \r\n
      if($cadena="")
      {
          continue;
      }
      $dividido= explode("-",$cadena);
        $Persona=new Persona($dividido[0],$dividido[1]);
        array_push($retorno,$Persona);
      

    }
    
    fclose($ar); 

     return $retorno;

 }

}

?>