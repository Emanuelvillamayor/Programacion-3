<?php
/*Ejercicio 22:
Crear la clase Garage que posea como atributos privados:
_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
i. La razón social.
ii. La razón social, y el precio por hora.
Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
*/
require "Auto.php";
class Garage
{
 #Atributos

 private $_razonSocial;
 private $_precioPorHora;
 private $_autos;


 #Constructores

 function __construct($razonSocial,$precioPorHora=0.0)
 {
     $this->_razonSocial=$razonSocial;
     $this->_precioPorHora=$precioPorHora;

     //incializo el array
     $this->_autos=[];
 }


#Metodos Instancia

public function  MostrarGarage()
{
   echo "Razon social:" . $this->_razonSocial . "<br>Precio por hora:" . $this->_precioPorHora ;
   echo  "<br>Autos:<br>" ;
   foreach($this->_autos as $autos)
   {
        Auto::MostrarAuto($autos);
   }
   echo "<br>";
}

//Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
//objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.

 public function Equals($auto)
 {
  //v1
  //utilizo funcion en clase autos
   $retorno = true;
   foreach($this->_autos as $auto1)
   {
    
     if( $auto1->Equals($auto1,$auto)) 
     {
        $retorno=false;     
     }
   }
   return $retorno;



   //v2
   // return in_array($auto,$this->_autos);
 }

//Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
//(sólo si el auto no está en el garaje, de lo contrario informarlo).

 public function Add($auto)
 {
    if($this->Equals($auto)==true)
    {
       array_push($this->_autos,$auto);
       echo "Auto agregado <br>";
    }
    else
    {
        echo "Error , el auto ya esta en el garage<br>";
    }

 }

//Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
//“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).

public function Remove($auto)
{
    if($this->Equals($auto)==true)
    {
     echo "No se encontro el auto a eliminar<br>";
    }
    else
    {
       unset($this->_autos[array_search($auto,$this->_autos)]);
     echo "Auto eliminado<br>";
    }
}
}
?>