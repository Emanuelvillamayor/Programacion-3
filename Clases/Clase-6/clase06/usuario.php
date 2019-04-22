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
            return $this->id." - ".$this->correo." - ".$this->clave." - ".$this->nombre . "-" . $this->apellido . "-" . $this->perfil;
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

    
}