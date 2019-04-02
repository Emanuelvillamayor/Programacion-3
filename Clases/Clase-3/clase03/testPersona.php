<?php
require "Clases/Persona.php";

/*
$persona1 = new Persona("Emanuel"," Villamayor");

//guardo la persona

if($persona1->Guardar()==true)
{
    echo "Guardado con exito!!!<br>";
}
else
{
    echo "Error al guardar";
}


$persona1->Leer();
*/
$hola =Persona::TraerTodasLasPersonas();
var_dump($hoal);
?>