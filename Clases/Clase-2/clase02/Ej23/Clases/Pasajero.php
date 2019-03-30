<?php
/*Ejercicio 23:
Pasajero
Atributos privados: _apellido (string), _nombre (string), _dni (string), _esPlus (boolean)
Crear un constructor capaz de recibir los cuatro parámetros.
Crear el método de instancia “Equals” que permita comparar dos objetos Pasajero. Retornará
TRUE cuando los _dni sean iguales.
Agregar un método getter llamado GetInfoPasajero , que retornará una cadena de caracteres
con los atributos concatenados del objeto.
Agregar un método de clase llamado MostrarPasajero que mostrará los atributos en la página.
*/


class Pasajero
{

    #Atributos
    private $_nombre;
    private $_apellido;
    private $_dni;
    public $_esPlus;


    #Constructor

    function __construct($nombre,$apellido,$dni,$esPlus)
    {
        $this->_nombre=$nombre;
        $this->_apellido=$apellido;
        $this->_dni =$dni;
        $this->_esPlus=$esPlus;
    }


    #Metodos Instancia

    public function Equals($pasajero2)
    {
     $retorno = false;

     if($this->_dni === $pasajero2->_dni)
     {
         $retorno=true;
     }
     return $retorno;
    }


    #Metodo Get
    //Agregar un método getter llamado GetInfoPasajero , que retornará una cadena de caracteres
   //con los atributos concatenados del objeto.

   public function GetInfoPasajero()
   {
       $retorno = "Nombre:" . $this->_nombre . "<br>Apellido:" . $this->_apellido . "<br>DNI:" . $this->_dni . "<br>Es Plus:" .(int) $this->_esPlus . "<br>";
       return  $retorno;
   }

   #Metodo Clase
   public static function MostrarPasajero($pasajero)
   {
       echo $pasajero->GetInfoPasajero();
   }

}


?>
