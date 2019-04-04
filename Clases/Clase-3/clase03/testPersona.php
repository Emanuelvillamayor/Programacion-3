<?php
require "Clases/Persona.php";

/*
$persona1 = new Persona("Emanuel","Villamayor");
$persona2 = new Persona("Marcos","Lopez");

//guardo la persona

if($persona1->Guardar()==true)
{
    echo "Guardado con exito!!!<br>";
}
else
{
    echo "Error al guardar";
}

if($persona2->Guardar()==true)
{
    echo "Guardado con exito!!!<br>";
}
else
{
    echo "Error al guardar";
}

$persona1->Leer();
*/

//obtengo el array de personas mediante la funcion:
$arrayPersonas =Persona::TraerTodasLasPersonas();

//recorro el array y muestro
foreach($arrayPersonas as $persona)
{
  echo $persona->ToString() . "<br>";
}

//muestro con var dump
//var_dump($hola);

?>