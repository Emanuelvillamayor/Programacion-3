<?php
require_once "./clases/Televisor.php";

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
$precio = isset($_POST['precio']) ? $_POST['precio'] : NULL;
$pais = isset($_POST['pais']) ? $_POST['pais'] : NULL;

$foto = isset($_FILES["foto"]["name"]) ? $_FILES["foto"]["name"] : NULL;



$objJson = new stdClass();
$objJson->Exito=false;
$objJson->Mensaje="No se pudo agregar en base de datos";

$televisor= new Televisor($tipo,$precio,$pais,$foto);

    $extension = pathinfo($foto,PATHINFO_EXTENSION);

    $nombreAGuardar=$televisor->tipo . "." . $televisor->paisOrigen. "." . date("Gis") . "." . $extension;

    $destino = "./televisores/imagenes/" .$nombreAGuardar;

    $teleFinal = new Televisor($tipo,$precio,$pais,$nombreAGuardar);
   
    if($teleFinal->Agregar())
    {
        
        if(move_uploaded_file($_FILES["foto"]["tmp_name"],$destino))
        {
            //me da error el header
         header('Location:Listado.php');
          $objJson->Exito=true;
          $objJson->Mensaje=" se pudo agregar en base de datos";
          echo json_encode($objJson);
 
        }
        else
        {
            echo json_encode($objJson);
        }
        
   }



?>