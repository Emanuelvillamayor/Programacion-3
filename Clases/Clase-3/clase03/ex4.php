<?php
//FUNCIONA CUANDO LO LLAMAMOS DESDE UN "form action=ex4.php"  

//a Post[] siempre le paso el valor del "name" del elemento que estoy enviando
//en este caso le estoy pasando el "name" de un "input" de texto y me va a devolver el "value"
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