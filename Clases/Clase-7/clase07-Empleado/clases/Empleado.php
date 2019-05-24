<?php
//require_once "IApiUsable.php";
require_once "AccesoDatos.php";
 class Empleado 
 {
     #Atributos

     public $apellido;
     public $nombre;
     public $legajo;
     public $sueldo;
     public $path_foto;

     #Constructor

     function __construct($legajo,$nombre,$apellido,$sueldo,$path)
     {
         $this->apellido=$apellido;
         $this->nombre=$nombre;
         $this->legajo=$legajo;
         $this->sueldo=$sueldo;
         $this->path_foto=$path;
     }

    /* inicio funciones especiales para slimFramework*/

    public function TraerUno($request, $response, $args) 
    {
        $legajo=$args['legajo'];
        $elEmpleado=Empleado::TraerUnEmpleado($legajo);
        $newResponse = $response->withJson($elEmpleado, 200);  
       return $newResponse;
    }

    public function TraerTodos($request, $response, $args) 
    {
        $todosLosEmpleados=Empleado::TraerTodosLosEmpleados();
        $newResponse = $response->withJson($todosLosEmpleados, 200);  
        return $newResponse;
    }
    //????
    public function CargarUno($request, $response, $args) 
    {
        $response->getBody()->write("<h1>Cargar uno nuevo</h1>");
        return $response;
    }

    public function BorrarUno($request, $response, $args) 
    {
        
        $ArrayDeParametros = $request->getParsedBody();
         var_dump($ArrayDeParametros);die();    	
        $legajo=$ArrayDeParametros['legajo'];
        $empleado= new Empleado($legajo,"a","b","c","d");

        $cantidadDeBorrados=$empleado->BorrarEmpleado();

        $objDelaRespuesta= new stdclass();
       $objDelaRespuesta->cantidad=$cantidadDeBorrados;
       if($cantidadDeBorrados>0)
           {
                $objDelaRespuesta->resultado="algo borro!!!";
           }
           else
           {
               $objDelaRespuesta->resultado="no Borro nada!!!";
           }
       $newResponse = $response->withJson($objDelaRespuesta, 200);  
         return $newResponse;
    }

    public function ModificarUno($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);    	
        $empleado= new Empleado($ArrayDeParametros['legajo'],$ArrayDeParametros['nombre'],$ArrayDeParametros['apellido'],$ArrayDeParametros['sueldo'],$ArrayDeParametros['path_foto']);


	   	$resultado =$empleado->ModificarEmpleadoParametros();
	   	$objDelaRespuesta= new stdclass();
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }




   /* final funciones especiales para slimFramework*/

     public function BorrarEmpleado()
     {
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            DELETE 
            FROM empleados 				
            WHERE legajo=:legajo");	
            $consulta->bindValue(':legajo',$this->legajo, PDO::PARAM_INT);		
            $consulta->execute();
            return $consulta->rowCount();
     }

     public static function BorrarEmpleadoSueldo($sueldo)
     {
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            delete 
            from empleados 				
            WHERE sueldo=:sueldo");	
            $consulta->bindValue(':sueldo',$sueldo, PDO::PARAM_INT);		
            $consulta->execute();
            return $consulta->rowCount();

     }
     
 

     public function ModificarEmpleado()
     {
            $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            update empleados 
            set nombre='$this->nombre',
            apellido='$this->apellido',
            sueldo='$this->sueldo',
            path_foto='$this->path_foto'
            WHERE legajo='$this->legajo'");
        return $consulta->execute();
     }
     


    public  function ModificarEmpleadoParametros()
     {
      $objetoDatos = AccesoDatos::DameUnObjetoAcceso();

      //ejecuto la consulta de eliminar un usuario en el "legajo" especificado en la base de datos
      $consulta =$objetoDatos->RetornarConsulta('UPDATE empleados SET nombre = :nombre, apellido = :apellido, sueldo = :sueldo, path_foto = :path_foto WHERE legajo = :legajoAUX' );

      $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
      $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
      $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_INT);
      $consulta->bindValue(':path_foto', $this->path_foto, PDO::PARAM_STR);

      $consulta->bindValue(':legajoAUX', $this->legajo, PDO::PARAM_INT);

      return $consulta->execute();

     }

    
     public function InsertarEmpleado()
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (legajo,nombre,apellido,sueldo,path_foto)values('$this->legajo','$this->nombre','$this->apellido','$this->sueldo','$this->path_foto')");
        $consulta->execute();
       // return $objetoAccesoDato->RetornarUltimoIdInsertado();
       return $consulta->execute();
     }

     public function InsertarEmpleadoParametros()
     {
        $objetoDatos = AccesoDatos::DameUnObjetoAcceso();

        $consulta =$objetoDatos->RetornarConsulta("INSERT INTO empleados (legajo, nombre, apellido, sueldo, path_foto)"
                                                        . "VALUES(:legajo, :nombre, :apellido, :sueldo, :path_foto)"); 
            
        $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_INT);
        $consulta->bindValue(':path_foto', $this->path_foto, PDO::PARAM_STR);

        //return $objetoAccesoDato->RetornarUltimoIdInsertado();
        return $consulta->execute();
     }

     /*TRAER TODOS: CON ID UTILIZANDO FETCH_CLASS
     public static function TraerTodosLosEmpleados()
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select id,titel as titulo, interpret as cantante,jahr as año from cds");
        $consulta->execute();			
        return $consulta->fetchAll(PDO::FETCH_CLASS, "cd");		
     }*/

     public static function TraerTodosLosEmpleados()
     {
        $empleados = array();
        $objetoDatos =AccesoDatos::DameUnObjetoAcceso();
        $consulta = $objetoDatos->RetornarConsulta('SELECT * FROM empleados'); //Se prepara la consulta, aquí se podrían poner los alias
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
          $empleado= new Empleado($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
          array_push($empleados,$empleado);
        }
        return $empleados;
     }

     public static function TraerUnEmpleado($legajo)
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM empleados WHERE legajo=:legajo");
        $consulta->bindValue(':legajo', $legajo, PDO::PARAM_INT);
        $consulta->execute();
        $fila = $consulta->fetch();
        $empleado= new Empleado($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
        
        return $empleado;
     }

     public static function TraerUnEmpleadoNombre($legajo,$nombre)
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM empleados WHERE legajo=:legajo AND nombre=:nombre");
        $consulta->bindValue(':legajo', $legajo, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $nombre, PDO::PARAM_STR);
        $consulta->execute();
        $fila = $consulta->fetch();
        $empleado= new Empleado($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
        
        return $empleado;

     }

     

     //Elimina una en archivo tenieno como referencia el legajo pasado por el empleado que se pasa por parametro
    /* public static function EliminarFoto($empleado)
     {
        $arrayEmpleados = Empleado::TraerTodos();

        foreach($arrayEmpleados as $emp)
        {
           if($emp->legajo == $empleado->legajo)
           {
              unlink($emp->path_foto);
           }
        }
     }
*/
     public function mostrarDatos()
     {
         return "Metodo mostrar" . $this->legajo." ". $this->nombre." ". $this->apellido . " " . $this->sueldo . " " . $this->path_foto;
     }

 }


?>
