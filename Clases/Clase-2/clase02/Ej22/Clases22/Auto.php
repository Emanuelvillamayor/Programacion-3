<?php
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

       $params = func_get_args();
       $num_params = func_num_args();
       $funcion_constructor ='__construct'.$num_params;
       if (method_exists($this,$funcion_constructor)) {
           call_user_func_array(array($this,$funcion_constructor),$params);
       }
   }
   public function __construct2($marca,$color){
       self::__construct();
       $this->_marca = $marca;
       $this->_color = $color;
   }
   public function __construct3($marca,$color,$precio){
       self::__construct($marca,$color);
       $this->_precio = $precio;
   }
   public function __construct4($marca,$color,$precio,$fecha){
       self::__construct($marca,$color,$precio);
       $this->_fecha = $fecha;
   }





#Metodos instancia


public function AgregarImpuestros($impuesto)
{
   $this->_precio+=$impuesto;
}

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

public static function  MostrarAuto($auto)
{
   echo "Color:" . $auto->_color . "<br>Marca:" . $auto->_marca . "<br>Precio:" . $auto->_precio . "<br>Fecha:" . $auto->_fecha."<br>";
}



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