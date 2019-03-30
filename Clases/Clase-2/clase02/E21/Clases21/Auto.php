<?php
/*
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
//para eso con solo ponerle un valor por default a cada parametro lo hacemos "opcional"
i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.
Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double
con la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
*/

class Auto
{
#Aributos

 private $_color;
 private $_precio;
 private $_marca;
 private $_fecha;
 
 #Constructor

 function __construct($_marca,$color,$precio=0.0,$fecha="00/00/00")
	{
        $this->_color=$color;
        $this->_marca=$_marca;
        $this->_precio=$precio;
        $this->_fecha=$fecha;
    }



#Metodos instancia

//Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
//parámetro y que se sumará al precio del objeto.
public function AgregarImpuestros($impuesto)
{
    $this->_precio+=$impuesto;
}

//Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
//devolverá TRUE si ambos “Autos” son de la misma marca.
public function Equals($auto1,$auto2)
{
    $retorno =false;
    if($auto1->_marca === $auto2->_marca) //verifico tambien "tipo ==="
    {
        $retorno=true;
    }
    return $retorno;
}



#Metodos clase

//Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
//por parámetro y que mostrará todos los atributos de dicho objeto.

public static function  MostrarAuto($auto)
{
    echo "Color:" . $auto->_color . "<br>Marca:" . $auto->_marca . "<br>Precio:" . $auto->_precio . "<br>Fecha:" . $auto->_fecha."<br>";
}

//Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
//de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double
//con la suma de los precios o cero si no se pudo realizar la operación.
//Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);

public static function Add($auto1 , $auto2)
{
    $retorno =0;
  if($auto1->Equals($auto1,$auto2) )
  { 
    if($auto1->_color == $auto2->_color)
    {
       $retorno =$auto1->precio +$auto2->precio;
    }
    else
    {
        echo "<br>     Error: autos con distinto color <br>";
    }
  }
  else
  {
    echo "<br>     Error: autos con distinta marca   <br>";
  }

    return $retorno;
}


}


?>



