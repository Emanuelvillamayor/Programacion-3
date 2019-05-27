<?php

require_once "./clases/Usuario.php";

$email = isset($_POST['email']) ? $_POST['email'] : NULL;
$clave = isset($_POST['clave']) ? $_POST['clave'] : NULL;
$foto =isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"] : NULL;

$extension = pathinfo($foto,PATHINFO_EXTENSION);

$nombreAGuardar=$email. "." . $clave. "." . date("Gis") . "." . $extension;

$destino = "imagenes/" . $nombreAGuardar;

$usuario = new Usuario($email,$clave,$nombreAGuardar);

$objJson=$usuario->GuardarEnArchivo();
if($objJson->Exito==true)
{
   if( move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
   {
     //echo  $objJson->Mensaje . ", junto con la imagen";
     echo json_encode($objJson);
   }
   else
   {
    echo json_encode($objJson);
    // echo $objJson->Mensaje . ", pero no se ha podido guardar la imagen";
   }
}
else
{
  echo json_encode($objJson);
}

?>