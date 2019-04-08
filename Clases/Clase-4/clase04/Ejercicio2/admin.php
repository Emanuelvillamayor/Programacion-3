<?php
require "Empleado.php";
/*
echo "POST:<br>";
var_dump($_POST);


echo "<br><br><br>";
echo "FILES:<br>";


var_dump($_FILES);
*/

//obtengo la extension del archiovo
$extension=pathinfo($_FILES["fileFoto"]["name"],PATHINFO_EXTENSION);


//voy a obtener el dato de destino de imagen
$destino ="fotos_empleados/" .$_POST["numLegajo"] ."_" . $_POST["txtApellido"] . "." .$extension;

$empleado = new Empleado($_POST["numLegajo"],$_POST["txtApellido"],$_POST["txtNombre"],$_POST["numSueldo"],$destino);
Empleado::Agregar($empleado);

//muevo el archivo temporal a una carpeta fisica $destino
if(move_uploaded_file($_FILES["fileFoto"]["tmp_name"],$destino))
{
    echo "Datos guardados correctamente!";
}
else
{
    echo "Error al guardar datos!";
}


//echo "<br><br>Hago var dump de Array de Empleados:<br>";

//var_dump($empleado->TraerTodos());

$arrayEmpleados = $empleado->TraerTodos();

foreach($arrayEmpleados as $empleadito)
{
    echo "Legajo:" . $empleadito->legajo;
     echo "Apellido:" . $empleadito->apellido;
    echo "Nombre:". $empleadito->nombre
    echo.$empleadito->sueldo."<img width=42 height=42 src='" . $empleadito->path_foto . "'/>" ."<br>";
}






?>