<?php
include_once ("AccesoDatos.php");
include_once ("usuario.php");

$op = isset($_POST['opcion']) ? $_POST['opcion'] : NULL;

switch ($op) 
{
    case 'traerUno':
    $id = isset($_POST['id']) ? $_POST['id'] : NULL;

    $usuario= usuario::TraerUno($id);
    if($usuario!==null || $usuario!==false)
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

    case 'traerTodos':
    $usuarios=[];

    $usuarios=usuario::TraerTodos();
    if($usuarios!==null && count($usuarios)!==0)
    {
        foreach($usuarios as $user)
        {
            //muestro cada usuario 1 por 1 del array
            echo $user->MostrarDatos() . "<br>";
        }
    }

    break;

    case 'ingresarUsuario':
    $usuario = new usuario(1,"prueba@hotmail.com","ki89","prueba","pruebita",47);

    echo usuario::Ingresar($usuario);
    

    echo "ok";

    break;

    case 'eliminarUsuario':

    $usuario = new usuario(9);

    echo usuario::Eliminar($usuario);

    echo "ok";

    break;

    case 'modificarUsuario':

        $id=$_POST['id'];
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $perfil=$_POST['perfil'];

        echo usuario::Modificar($id,$correo,$clave,$nombre,$apellido,$perfil);

        echo "ok";
    
    break;

    case 'verificarUsuario':
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];

       //echo (int) usuario::Verificar("cambio@hotmail.com","888");

        if(usuario::Verificar($correo,$clave))
        {
            echo "Usuario registrado";
        }
        else
        {
            echo "Usuario no registrado";
        }

    break;

    
    default:
        echo ":(";
        break;
}