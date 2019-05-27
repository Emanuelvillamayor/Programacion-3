<?php
require_once "./clases/Televisor.php";
//get
$tipoGet = isset($_GET['tipo']) ? $_GET['tipo'] : NULL;

//post
$tipoPost = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
$accionPost= isset($_POST['accion']) ? $_POST['accion'] : NULL;

$objJson = new stdClass();
$objJson->Exito=false;
$objJson->Mensaje="No se pudo borrar en base de datos";

if(isset($_GET["tipo"]))
{
  $tele = new Televisor($tipoGet,"as","da","r");
  $arrayTele = $tele->Traer();
  if($tele->VerificarTipo($arrayTele))
  {
   echo "Esta en la base de datos";
  }
  else
  {
    echo "No esta en la base de datos";
  }

}


if($accionPost=="borrar")
{
  $teleEliminar = new Televisor($tipoPost,"as","da","r");

  if($teleEliminar->Eliminar($tipoPost))
  {
    header("location:Listado.php");
  }
  else
  {
    echo json_encode($objJson);
  }
}

?>