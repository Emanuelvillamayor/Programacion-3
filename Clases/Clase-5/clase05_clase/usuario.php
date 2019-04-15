<?php
require "./BaseDatos.php";
class Usuario
{

    #atributos
public $id;
public $correo;
public $clave;
public $nombre;
public $apellido;
public $perfil;


#constructor

public function __construct($id=null,$correo=null,$clave=null,$nombre=null,$apellido=null,$perfil=null)
{
    $this->id=$id;
    $this->correo=$correo;
    $this->clave=$clave;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->perfil=$perfil;
}


#metodo instancia

public function TraerId($id)
{
  $con=BaseDatos::EstablecerConexion();

  $sql = "SELECT * FROM usuarios WHERE id={$id}";

    $rs = mysql_db_query("usuarios",$sql,$con);
    $usuario=null;

    if($rs!==false)
    {
        echo "entra";
        $datos= mysql_fetch_object($rs);
        $usuario = new Usuario($datos["id"],$datos["correo"],$datos["clave"],$datos["nombre"],$datos["apellido"],$datos["perfil"]);
    }

    BaseDatos::CerrarConexion();
    return $usuario;
}





}


?>