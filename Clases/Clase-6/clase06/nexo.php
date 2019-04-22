<?php
include_once ("AccesoDatos.php");
include_once ("usuario.php");

$op = isset($_POST['opcion']) ? $_POST['opcion'] : NULL;

switch ($op) 
{
    case 'traerUno':
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;

    $usuario= usuario::TraerUno($id);
    if($usuario!==null)
    {
        $usuario=usuario::TraerUno($id);
        echo  $usuario->MostrarDatos();
        //var_dump($usuario);
    }

    else
    {
        "error";
    }
       break;
    
    default:
        echo ":(";
        break;
}