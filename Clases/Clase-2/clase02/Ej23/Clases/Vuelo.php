<?php
/*Ejercicio 23:
Vuelo
Atributos privados: _fecha (DateTime), _empresa (string) _precio (double), _listaDePasajeros
(array de tipo Pasajero), _cantMaxima (int; con su getter). Tanto _listaDePasajero como
_cantMaxima sólo se inicializarán en el constructor.
Crear el constructor capaz de que de poder instanciar objetos pasándole como parámetros:
i. La empresa y el precio.
ii. La empresa, el precio y la cantidad máxima de pasajeros.
Agregar un método getter, que devuelva en una cadena de caracteres toda la información de
un vuelo: fecha, empresa, precio, cantidad máxima de pasajeros, y toda la información de
todos los pasajeros.
Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista,
se agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de
retorno de este método indicará si se agregó o no.
Agregar un método de instancia llamado MostrarVuelo, que mostrará la información de un
vuelo.
Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá
ser de tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si
un pasajero es Plus, se le hará un descuento del 20% en el precio del vuelo.
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y
cuando el pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un
objeto de tipo Vuelo.
*/

require "Pasajero.php";

class Vuelo
{
#Atributos

private $_fecha;
private $_empresa;
private $_precio;
private $_listaDePasajero;
private $_cantMaxima;


#Constructor

function __construct($empresa,$precio,$cantMaximaPasajero="10")
{
 $this->_empresa=$empresa;
 $this->_precio=$precio;

 $this->_fecha = date("d-m-Y");
 $this->_cantMaxima=$cantMaximaPasajero;
 $this->_listaDePasajero = [];

}

#Metodo Get

public function GetInfoVuelo()
{
    $str = "Fecha: $this->_fecha, Empresa: $this->_empresa, Precio: $this->_precio, Cantidad Maxima: $this->_cantMaxima, Pasajeros: <br>";
    foreach($this->_listaDePasajero as $pasajero)
    {
       // $str =$str. Pasajero ::MostrarPasajero($pasajero);
        $str=$str . $pasajero->GetInfoPasajero();
    }
    return $str;
}

#Metodos de Instancia

/*
Crear un método de instancia llamado AgregarPasajero, en el caso que no exista en la lista,
se agregará (utilizar Equals). Además tener en cuenta la capacidad del vuelo. El valor de
retorno de este método indicará si se agregó o no.
*/

public function AgregarPasajero($pasajero)
{
  $retorno = false;
  $flag = false;
    foreach($this->_listaDePasajero as $pasaje)
    {
        if($pasaje->Equals($pasajero)==1)
        {
            $flag=true;
        }
    }

    if($flag==false)
    {
      if(count($this->_listaDePasajero)+1 <= $this->_cantMaxima)
      {
         array_push($this->_listaDePasajero,$pasajero);
          $retorno=true;
      }
    }

    return $retorno;
}

/*
Agregar un método de instancia llamado MostrarVuelo, que mostrará la información de un
vuelo.
*/

public function MostrarVuelo()
{
    echo $this->GetInfoVuelo();
}

#Metodos de Clase

/*
Crear el método de clase “Add” para que permita sumar dos vuelos. El valor devuelto deberá
ser de tipo numérico, y representará el valor recaudado por los vuelos. Tener en cuenta que si
un pasajero es Plus, se le hará un descuento del 20% en el precio del vuelo.
*/
public static function Add($vuelo1,$vuelo2)
{
    $retorno=0;
    foreach($vuelo1->_listaDePasajero as $pasajero)
    {
        if($pasajero->_esPlus==true)
        {
         $retorno += $vuelo1->_precio - ($vuelo1->_precio*0.2);
        }
        else
        {
            $retorno+=$vuelo1->_precio;
        }
    }

    foreach($vuelo2->_listaDePasajero as $pasajero2)
    {
        if($pasajero2->_esPlus==true)
        {
         $retorno += $vuelo2->_precio - ($vuelo2->_precio*0.2);
        }
        else
        {
            $retorno+=$vuelo2->_precio;
        }
    }
    return $retorno;
}

/*
Crear el método de clase “Remove”, que permite quitar un pasajero de un vuelo, siempre y
cuando el pasajero esté en dicho vuelo, caso contrario, informarlo. El método retornará un
objeto de tipo Vuelo.
*/

public static function Remove($vuelo,$pasajero)
{

if(in_array($pasajero,$vuelo->_listaDePasajero)){
    array_splice($vuelo->_listaDePasajero,array_search($pasajero,$vuelo->_listaDePasajero),1);
}else{
    echo "El pasajero no se encuentra en el vuelo.<br>";
}
return $vuelo;
}

 
}


?>