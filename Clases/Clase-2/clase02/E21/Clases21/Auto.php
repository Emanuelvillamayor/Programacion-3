<?php
/*
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:
_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)
Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:
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

 function __construct()
 {
    /* 
     $this->_marca="Ford";
     $this->_color="Negro";
     $this->_precio =20;
     $this->_fecha ="00/00/00";
     */
    
    $params = func_get_args();
		$num_params = func_num_args();
		$funcion_constructor ='__construct'.$num_params;
		if (method_exists($this,$funcion_constructor)) {
			call_user_func_array(array($this,$funcion_constructor),$params);
        }
        
 }

 
 //i. La marca y el color.
 public function __construct2($marca,$_color)
 {
    self::__construct();
    $this->_marca=$marca;
    $this->_color=$_color;
 }


//ii. La marca, color y el precio.
public function __construct3($marca,$color,$precio)
{
    self::__construct2($marca,$color);
    $this->_precio=$precio;
}

//iii. La marca, color, precio y fecha.
public function __construct4($marca,$color,$precio,$fecha)
{
    self::__construct3($marca,$color,$precio);
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



