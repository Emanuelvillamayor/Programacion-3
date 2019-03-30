<?php
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