<?php
//a Post[] siempre le paso el valor del "name" del elemento que estoy enviando
$nombre = $_POST["nombre"];
echo $nombre."<br>";

$apellido = $_POST["apellido"];
echo $apellido;
/*
var_dump($_POST);
echo "<br>";
var_dump($_GET);
echo "<br>";
var_dump($_REQUEST);
*/

die();
?>