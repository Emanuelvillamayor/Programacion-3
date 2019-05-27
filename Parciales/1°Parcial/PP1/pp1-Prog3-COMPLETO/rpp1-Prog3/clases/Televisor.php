<?php
require_once "IParte2.php";
require_once "IParte3.php";
require_once "AccesoDatos.php";
require_once "IParte4.php";
class Televisor implements IParte2,IParte3,IParte4
{
   #atributos
   public $tipo;
   public $precio;
   public $paisOrigen;
   public $path;

   #constructor
   public function __construct($tipo = null, $precio = null, $paisOrigen = null, $path = null)
   {
    $this->tipo = $tipo != null ? $tipo : "";
    $this->precio = $precio != null ? $precio : "";
    $this->paisOrigen = $paisOrigen != null ? $paisOrigen : "";
    $this->path = $path != null ? $path : "";
    }

    #metodo instancia
    public function ToJson()
    {
        $auxJson = new stdClass();
        $auxJson->tipo = $this->tipo;
        $auxJson->precio = $this->precio;
        $auxJson->paisOrigen = $this->paisOrigen;
        $auxJson->path = $this->path;

        return json_encode($auxJson);
    }


    public function Agregar()
    {

        $objetoDatos = AccesoDatos::DameUnObjetoAcceso();

        $consulta =$objetoDatos->RetornarConsulta("INSERT INTO televisores (tipo, precio, pais, foto)"
                                                    . "VALUES(:tipo, :precio, :pais, :foto)"); 
        
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':pais', $this->paisOrigen, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $this->path, PDO::PARAM_STR);

        

        return $consulta->execute();
    }

    public function Traer()
    {
        $televisores = array();
        $objetoDatos =AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoDatos->RetornarConsulta('SELECT * FROM televisores'); //Se prepara la consulta, aquí se podrían poner los alias
        $consulta->execute();

        /*v1
        $consulta->setFetchMode(PDO::FETCH_LAZY);

        foreach ($consulta as $tele) {
            $auxTele = new Televisor($tele->tipo,$tele->precio,$tele->pais,$tele->foto);
            array_push($auxReturn, $auxTele);
        }*/

        //v2
        while($fila = $consulta->fetch())
        {
          $tele= new Televisor($fila[1],$fila[2],$fila[3],$fila[4]);
          array_push($televisores,$tele);
        }
        return $televisores;
    }

    public function CalcularIva()
    {
        $auxIva = $this->precio *21 /100;            
        return $this->precio + $auxIva;
    }

    public function Modificar($id,$tipo,$precio,$pais,$path)
    {
        $retorno = false;
            
       
        $objetoDatos = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoDatos->RetornarConsulta('UPDATE televisores SET tipo = :tipo, precio = :precio, pais = :pais, foto = :foto WHERE id=:id');

        $consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
        $consulta->bindValue(':precio', $precio, PDO::PARAM_INT);
        $consulta->bindValue(':pais', $pais, PDO::PARAM_STR);
        $consulta->bindValue(':foto', $path, PDO::PARAM_STR);

        $consulta->bindValue(':id',$id,PDO::PARAM_INT);
       /* $consulta->bindValue(':tipoAct', $this->tipo, PDO::PARAM_STR);
        $consulta->bindValue(':precioAct', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':paisAct', $this->paisOrigen, PDO::PARAM_STR);
        $consulta->bindValue(':fotoAct', $this->pathImagen, PDO::PARAM_STR);*/

        $consulta->execute();
        if($consulta->rowCount() > 0) 
        {
            $retorno = true;
        }
    return $retorno;
    }

    public function Verificar($arrayTele)
    {
        $retorno = true;

        foreach ($arrayTele as $tele)
        {
            if($tele->ToJson() === $this->ToJson())
            {
                $retorno=false;
                break;
            }
        }

        return $retorno;
    }

    public function Eliminar($tipo)
    {
        $retorno = false;
            
       
        $objetoDatos = AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoDatos->RetornarConsulta("DELETE FROM televisores WHERE tipo=:tipo");


        $consulta->bindValue(':tipo',$tipo,PDO::PARAM_INT);

        $consulta->execute();
        if($consulta->rowCount() > 0) 
        {
            $retorno = true;
        }
    return $retorno;
    }

    public function VerificarTipo($arrayTele)
    {
        $retorno = false;

        foreach ($arrayTele as $tele)
        {
 
            if($tele->tipo===$this->tipo)
            {
                $retorno=true;
                break;
            }
        }

        return $retorno;
    }
    
}


?>