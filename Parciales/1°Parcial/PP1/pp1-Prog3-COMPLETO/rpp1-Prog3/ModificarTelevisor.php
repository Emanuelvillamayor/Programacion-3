<?php
require_once "./clases/Televisor.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
$precio = isset($_POST['precio']) ? $_POST['precio'] : NULL;
$pais = isset($_POST['pais']) ? $_POST['pais'] : NULL;

$foto = isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"] : NULL;
$id = isset($_POST['id']) ? $_POST['id'] :NULL;
$flag=false;

$objJson = new stdClass();
$objJson->Exito=false;
$objJson->Mensaje="No se pudo modificar en base de datos";

$televisor= new Televisor($tipo,$precio,$pais,$foto);

if($televisor->Modificar($id,$tipo,$precio,$pais,$foto))
{
   //me da error el header
    header("location:Listado.php");
    $objJson->Exito=true;
    $objJson->Mensaje="Se pudo modificar en base de datos";
    echo json_encode($objJson);
}
else
{
 echo json_encode($objJson);
}

?>