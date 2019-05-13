<?php

require_once "./clases/Juguete.php";


$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
$precio = isset($_POST['precio']) ? $_POST['precio'] : NULL;
$pais = isset($_POST['pais']) ? $_POST['pais'] : NULL;

$id = isset($_POST['id']) ? $_POST['id'] :NULL;

$foto = isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"] : NULL;

$juguete= new Juguete($tipo,$precio,$pais,$foto);

if($juguete->Modificar($tipo,$precio,$pais,$foto))
{

}


?>

