<?php
class usuario
{
    #atributos
    public $id;
    public $correo;
    public $clave;
    public $nombre;
    public $apellido;
    public $perfil;

   public function __construct($id=null,$correo=null,$clave=null,$nombre=null,$apellido=null,$perfil=null)
   {
    if($id != null)
      {
       $this->id=$id;
       $this->correo=$correo;
       $this->clave=$clave;
       $this->nombre=$nombre;
       $this->apellido=$apellido;
       $this->perfil=$perfil;
      }
   }

   #Metodo instancia

   public function MostrarDatos()
    {
            return $this->id." - ".$this->correo." - ".$this->clave." - ".$this->nombre . " - " . $this->apellido . " - " . $this->perfil;
    }

    #metodo estatico

    public static  function TraerUno($id)
    {
        $usuario = null;

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE id=:id");

        $consulta->bindValue(':id',  $id, PDO::PARAM_INT);

        $consulta->execute();

        //V1:obtengo la fila especificada en la consultado , como tipo indexado o por clave
       /* $fila=$consulta->fetch();

        if($fila!==null)
        {
          $usuario= new usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
        }*/

      
       //V2:creo un objeto de tipo usuario
       $usuario = $consulta->fetchObject('usuario');

        return $usuario;
    }

    public static function TraerTodos()
    {
      $usuarios =[];

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");

       // $consulta->bindValue(':id',  $id, PDO::PARAM_INT);

        $consulta->execute();

        //V1:obtengo la fila especificada en la consultado , como tipo indexado o por clave
        //utilizo un while ya que necesito varias filas y creo varios objetos
        /*while($fila = $consulta->fetch())
        {
          $usuario= new usuario($fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
          array_push($usuarios,$usuario);
        }*/


        //V2:creo objetos de tipo usuario
        //utilizo while porque necesito varias filas y creo varios objetos
         
        while ($fila = $consulta->fetchObject("usuario"))
        {
         array_push($usuarios,$fila);
        }


         //V3: utilizando FETCH_INTO , debo retornar la misma consulta
        /* $consulta->setFetchMode(PDO::FETCH_INTO, new usuario());
         return $consulta;*/
      
       
        return $usuarios;
    }

    public static function Ingresar($obj)
    {
    
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
      //no le paso el id ya que es autoincremental
      $consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO usuarios (correo, clave, nombre, apellido, perfil) values (:correo , :clave , :nombre , :apellido , :perfil)");

  
      $consulta->bindValue(':correo', $obj->correo, PDO::PARAM_STR);
      $consulta->bindValue(':clave', $obj->clave, PDO::PARAM_STR);
      $consulta->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
      $consulta->bindValue(':apellido', $obj->apellido, PDO::PARAM_STR);
      $consulta->bindValue(':perfil', $obj->perfil, PDO::PARAM_INT);

     return $consulta->execute();

    }


    public static function Eliminar($obj)
    {
      
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
      //no le paso el id ya que es autoincremental
      $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios where id = :id");

      $consulta->bindValue(':id',$obj->id,PDO::PARAM_INT);

      return $consulta->execute();
    }

    public static function Modificar($id,$correo,$clave,$nombre,$apellido,$perfil)
    {

      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        
      $consulta =$objetoAccesoDato->RetornarConsulta("UPDATE usuarios SET correo = :correo, clave = :clave, 
                                                      nombre = :nombre, apellido = :apellido, perfil = :perfil WHERE id = :id");
      
      $consulta->bindValue(':id',$id,PDO::PARAM_INT);
      $consulta->bindValue(':correo', $correo, PDO::PARAM_STR);
      $consulta->bindValue(':clave', $clave, PDO::PARAM_STR);
      $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
      $consulta->bindValue(':apellido', $apellido, PDO::PARAM_STR);
      $consulta->bindValue(':perfil', $perfil, PDO::PARAM_INT);

      return $consulta->execute();


    }
    
}