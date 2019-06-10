<?php
//require_once "IApiUsable.php";
require_once "IApiEmpleado.php";
require_once "AccesoDatos.php";
 class Empleado1 implements IApiEmpleado
 {
     #Atributos

     public $apellido;
     public $nombre;
     public $legajo;
     public $sueldo;
     public $path_foto;

     #Constructor

     function __construct($legajo=null,$nombre=null,$apellido=null,$sueldo=null,$path=null)
     {
         $this->apellido=$apellido;
         $this->nombre=$nombre;
         $this->legajo=$legajo;
         $this->sueldo=$sueldo;
         $this->path_foto=$path;
     }


     public static function AltaUsuario($request,$response,$next)
     {
         //obtengo el json
        $ArrayDeParametros = $request->getParsedBody();
        $user=json_decode ($ArrayDeParametros['user']);

        //obtengo la foto
        $archivos= $request->getUploadedFiles();
        $foto=$archivos['foto']->getClientFilename();

        //json de retorno
        $objJson= new stdClass();
        $objJson->Exito=false;
        $objJson->Mensaje="Error no se pudo agregar empleado";
        $objJson->Estado=404;

        //obtengo la extension
        $extension= explode(".", $foto);
        $extension=array_reverse($extension);
 
        //obtengo el nombre que voy a guardar como path en base de datos
        $nombreAGuardar= date("d-m-Y") .".".$user->legajo ."." . $extension[0];

        //destino en donde voy a guardar la foto
        $destino = "./fotos/" . $nombreAGuardar;

        $empleado= new Empleado1($user->legajo,$user->nombre,$user->apellido,$user->sueldo,$nombreAGuardar);

        //agrego el usuario
        if($empleado->AgregarUsuarioBD())
        {
            $objJson->Mensaje="Ok";
            $objJson->Estado=200;
            $objJson->Exito=true;

            $newResponse= $response->withJson($objJson,$objJson->Estado); 
            try
            {
                $archivos["foto"]->moveTo($destino);
            }
            catch(Exception $e)
            {
                $objJson->Mensaje=$e->getMessage();
               $newResponse= $response->withJson($objJson,$objJson->Estado); 
            }

        }
        else
        {
            $objJson->Mensaje="Ok";


            $newResponse= $response->withJson($objJson,$objJson->Estado); 
        }
        
         return $newResponse;
     }

     public static function TraerTodosUsuarios($request,$response,$next){}

     public static function EliminarUsuario($request,$response,$next)
     {
        $ArrayDeParametros = $request->getParsedBody();
        $legajo = $ArrayDeParametros['legajo'];


        $objJson= new stdClass();
        $objJson->Exito=false;
        $objJson->Mensaje="No se encontro al usuario";
       
        $empleado= new Empleado1($legajo);

        $empleadoViejo=$empleado->TraerUnUsuarioBD();
       
        //valido que me retorne algo correcto
        if($empleadoViejo->legajo ==$legajo)
        {
            $cantidadDeBorrados= $empleado->EliminarUsuarioBD();

            if($cantidadDeBorrados>0)
            {
                copy("./fotos/".$empleadoViejo->path_foto,"./fotos/eliminadas/".$empleadoViejo->path_foto);
                //elimino la imagen anterior ya que esta es reemplazada por la nueva que agregamos
                unlink("./fotos/".$empleadoViejo->path_foto);
            $objJson->Mensaje="Se pudo eliminar al empleado";
            $objJson->Exito=true;
            $newResponse = $response->withJson($objJson,202);
            }
            else
            {
                $objJson->Mensaje="No se pudo eliminar de la base de datos";
                $newResponse = $response->withJson($objJson,404);
            }
        }
        else
        {
            $newResponse = $response->withJson($objJson,404);
        }

        return $newResponse;


     }
     public static function ModificarUsuario($request,$response,$next)
     {
         //otengo el objUsuario y lo decodeo
        $ArrayDeParametros = $request->getParsedBody();
        $user=json_decode ($ArrayDeParametros['user']);
        
        //obtengo la foto
        $archivos= $request->getUploadedFiles();
        $foto=$archivos['foto']->getClientFilename();

          //json de retorno
          $objJson= new stdClass();
          $objJson->Exito=false;
          $objJson->Mensaje="Error no se pudo agregar empleado";
          $objJson->Estado=404;
  
          //obtengo la extension
          $extension= explode(".", $foto);
          $extension=array_reverse($extension);
   
          //obtengo el nombre que voy a guardar como path en base de datos
          $nombreAGuardar= date("d-m-Y") .".".$user->legajo ."." . $extension[0];
  
          //destino en donde voy a guardar la foto
          $destino = "./fotos/" . $nombreAGuardar;
  
          $empleado= new Empleado1($user->legajo,$user->nombre,$user->apellido,$user->sueldo,$nombreAGuardar);
          if($empleado->ModificarEmpleadoBD())
          {
          }
          else
          {
              
          }



     }

    public static function TraerUnUsuario($request,$response,$next)
    {
        //recupero el legajo
        $legajo = $_GET['legajo'];

        $objJson= new stdClass();
        $objJson->Exito=false;
        $objJson->Mensaje="Error, no se encontro al usuario";
        $objJson->usuarioJson=null;


        $empleado = new Empleado1($legajo);

        //otengo al empleado de la base de datos
        $empleadoViejo=$empleado->TraerUnUsuarioBD();

        if($empleadoViejo->legajo ==$legajo)
        {
            $objJson->Exito=true;
            $objJson->Mensaje="Usuario existente";
            $objJson->usuarioJson= $empleadoViejo;
           
            $newResponse= $response->withJson($objJson,200);
        }
        else
        {
            $newResponse= $response->withJson($objJson,404);
        }

        return $newResponse;

    }

     public function AgregarUsuarioBD()
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT into empleados (legajo,nombre,apellido,sueldo,path)values('$this->legajo','$this->nombre','$this->apellido','$this->sueldo','$this->path_foto')");
       // return $objetoAccesoDato->RetornarUltimoIdInsertado();
       return $consulta->execute();

     }

     public function EliminarUsuarioBD()
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

     public function TraerUnUsuarioBD()
     {
        $objetoAccesoDato = AccesoDatos::DameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT * FROM empleados WHERE legajo=:legajo");
        $consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_INT);
        $consulta->execute();
        $fila = $consulta->fetch();
        $empleado= new Empleado1($fila[1],$fila[2],$fila[3],$fila[4],$fila[5]);
        return $empleado;
     }

     public function ModificarEmpleadoBD()
     {
        $objetoDatos = AccesoDatos::DameUnObjetoAcceso();

        //ejecuto la consulta de eliminar un usuario en el "legajo" especificado en la base de datos
        $consulta =$objetoDatos->RetornarConsulta('UPDATE empleados SET nombre = :nombre, apellido = :apellido, sueldo = :sueldo, path = :path WHERE legajo = :legajoAUX' );
  
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
        $consulta->bindValue(':sueldo', $this->sueldo, PDO::PARAM_INT);
        $consulta->bindValue(':path', $this->path_foto, PDO::PARAM_STR);
  
        $consulta->bindValue(':legajoAUX', $this->legajo, PDO::PARAM_INT);
  
        return $consulta->execute();

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
/*
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
     }*/

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