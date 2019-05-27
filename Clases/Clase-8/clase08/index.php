<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once './vendor/autoload.php';
require_once "./clases/Test.php";
require_once "./clases/Usuario.php";
//require_once '/clases/AccesoDatos.php';
//require_once '/clases/cd.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

/*
¡La primera línea es la más importante! A su vez en el modo de 
desarrollo para obtener información sobre los errores
 (sin él, Slim por lo menos registrar los errores por lo que si está utilizando
  el construido en PHP webserver, entonces usted verá en la salida de la consola 
  que es útil).

  La segunda línea permite al servidor web establecer el encabezado Content-Length, 
  lo que hace que Slim se comporte de manera más predecible.
*/

//*********************************************************************************************//
//INICIALIZO EL APIREST
//*********************************************************************************************//
$app = new \Slim\App(["settings" => $config]);

//*********************************************************************************************//
//CONFIGURO LOS VERBOS GET, POST, PUT Y DELETE
//*********************************************************************************************//
$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->post('[/]', function (Request $request, Response $response) {   
    $response->getBody()->write("POST => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->put('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write("PUT => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->delete('[/]', function (Request $request, Response $response) {  
    $response->getBody()->write("DELETE => Bienvenido!!! a SlimFramework");
    return $response;

});

//*********************************************************************************************//
//RUTEOS
//*********************************************************************************************//
$app->get('/ruteo/', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, sin params");
    return $response;

});

$app->get('/ruteo/{param}', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, con params");
    return $response;

});

$app->get('/ruteoOpcional[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, sin params y / opcional");
    return $response;

});

$app->get('/ruteoOpcional/{param}', function (Request $request, Response $response) {    
    $response->getBody()->write("Ruteo, con params opcional");
    return $response;

});

//*********************************************************************************************//
//ATENDER TODOS LOS VERBOS DE HTTP
//*********************************************************************************************//
$app->any('/cualquiera/[{id}]', function ($request, $response, $args) {
    
    var_dump($request->getMethod());
    $id=$args['id'];
    $response->getBody()->write("Cualquier verbo de HTTP. Parametro: {$id} - ");
    return $response;
});

//*********************************************************************************************//
//ATENDER ALGUNOS VERBOS DE HTTP
//*********************************************************************************************//
$app->map(['GET', 'POST'], '/mapeado', function ($request, $response, $args) {

      var_dump($request->getMethod());
     $response->getBody()->write("Solo POST y GET - ");
});

//*********************************************************************************************//
//AGRUPACION DE RUTAS
//*********************************************************************************************//
$app->group('/saludo', function () {

    $this->get('/', function ($request, $response, $args) {
        $response->getBody()->write("HOLA, Bienvenido a la apirest... ingresá tu nombre");
    });

    $this->get('/{nombre}', function ($request, $response, $args) {
        $nombre=$args['nombre'];
        $response->getBody()->write("HOLA, Bienvenido <h1>$nombre</h1> a la apirest");
    });
 
     $this->post('/', function ($request, $response, $args) {      
        $response->getBody()->write("HOLA, Bienvenido a la apirest por post");
    });
     
});

//*********************************************************************************************//
//AGRUPACION DE RUTAS Y MAPEO
//*********************************************************************************************//
$app->group('/usuario/{id:[0-9]+}', function () {

    $this->map(['POST', 'DELETE'], '', function ($request, $response, $args) {
        $response->getBody()->write("Accedo al usuario por ID (con POST o DELETE) ");
    });

    $this->get('/nombre', function ($request, $response, $args) {
        $response->getBody()->write("Accedo al usuario por ID y retorno el nombre (con GET) ");
    });

});

//*********************************************************************************************//
//PARAMETROS 
//*********************************************************************************************//
$app->get('/datos/', function (Request $request, Response $response) {     
    $datos = array('nombre' => 'rogelio','apellido' => 'agua', 'edad' => 40);
    $newResponse = $response->withJson($datos, 200);  
    return $newResponse;
});

$app->post('/datos/', function (Request $request, Response $response) {    
    $ArrayDeParametros = $request->getParsedBody();
    //var_dump($ArrayDeParametros);
    $objeto= new stdclass();
    $objeto->nombre=$ArrayDeParametros['nombre'];
    $objeto->apellido=$ArrayDeParametros['apellido'];
    $objeto->edad=$ArrayDeParametros['edad'];
    $newResponse = $response->withJson($objeto, 200);  
    return $newResponse;

});

$app->put('/datos/', function (Request $request, Response $response) {    
    $ArrayDeParametros = $request->getParsedBody();
    $obj = json_decode(($ArrayDeParametros["cadenaJson"]));
    var_dump($obj);
});



//*********************************************************************************************//
/*LLAMADA A METODOS DE INSTANCIA DE UNA CLASE*/
//*********************************************************************************************//
$app->group('/cd', function () {   

    $this->get('/', \cd::class . ':traerTodos');
    $this->get('/{id}', \cd::class . ':traerUno');
    $this->delete('/', \cd::class . ':BorrarUno');
    $this->put('/', \cd::class . ':ModificarUno');

//*********************************************************************************************//
//SUBIDA DE ARCHIVOS (SE PUEDEN TENER FUNCIONES DEFINIDAS)
//*********************************************************************************************//
    $this->post('/', function (Request $request, Response $response) {
            
        $ArrayDeParametros = $request->getParsedBody();
        //var_dump($ArrayDeParametros);
        $titulo= $ArrayDeParametros['titulo'];
        $cantante= $ArrayDeParametros['cantante'];
        $año= $ArrayDeParametros['anio'];
        
        $micd = new cd();
        $micd->titulo=$titulo;
        $micd->cantante=$cantante;
        $micd->año=$año;
        $micd->InsertarElCdParametros();

        $archivos = $request->getUploadedFiles();
        $destino="./fotos/";
        //var_dump($archivos);
        //var_dump($archivos['foto']);

        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        //var_dump($nombreAnterior);
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("cd");

        return $response;

    });
     
});




/*CLASE 08*/

$app->group('/credenciales', function () 
{
    $this->post('/', function (Request $request, Response $response)
    {
        $response->getBody()->write("POST => BIENVENIDO AL GRUPO CREDENCIALES<br>");
        return $response;
    });

    $this->get('/', function (Request $request, Response $response)
    {
        $response->getBody()->write("Get => BIENVENIDO AL GRUPO CREDENCIALES<br>");
        return $response;
    });

})->add(function($request,$response,$next){
    
    $response->getBody()->write("Middleware UNO Antes de API => GRUPO CREDENCIALES<br>");

    //este flag va a validar si se va a ejecutar el "next" de la api
    $flag=false;

    //valido por donde viene si por "get" o por "Post"
    if($request->isGet())
    {
       // $response->getBody()->write("Viene por Get<br>");
        $response->getBody()->write("Viene por ".$request->getMethod() . "<br>");
    }
    if($request->isPost())
    {
       // $response->getBody()->write("Viene por Post<br>");
        $response->getBody()->write("Viene por ".$request->getMethod() . "<br>");

        //recupero datos de tipo y nombre desde POST
        $ArrayDeParametros = $request->getParsedBody();
        $tipo = $ArrayDeParametros['tipo'];
        $nombre = $ArrayDeParametros['nombre'];

        //muestro esos datos que recupero por POST
        $response->getBody()->write("Nombre: ". $nombre . "  Tipo:" . $tipo . "<br>");

        //valido que el tipo sea "admin"
        if($tipo=="admin")
        {
            $response->getBody()->write("El tipo es admin , Nombre: " . $nombre . "=> LLEGA A EL VERBO<br>");
        }
        else
        {
            $response->getBody()->write("Error !! El tipo es distinto de admin =>NO LLEGA A EL VERBO<br>");
            $flag=true;
        }
    }

    //ejecuto la API
    if($flag==false)
    {

        $response=$next($request,$response);
    }

    $response->getBody()->write("Middleware UNO Despues de API => GRUPO CREDENCIALES<br>");

    return $response;
    
});


$app->group('/test', function () {   


    $this->get('/', function (Request $request, Response $response)
    {
        $response->getBody()->write("Get => BIENVENIDO AL GRUPO Test<br>");
        return $response;
    })->add(\Test::class . ':MostrarInstancia');

})->add(\Test::class . '::MostrarEstatico');


$app->group('/POO', function () {   


    $this->get('/', function (Request $request, Response $response)
    {
        $arrayUsuarios=[];

        $ar=fopen("./archivos/usuarios.txt","r");

        while(!feof($ar))
        {
            $cadena=fgets($ar);

            if($cadena=="")
            {
                continue;
            }

            $divido=explode("-",$cadena);

            //para que lo ultimo en leer no tenga el "\r\n"
            $ultimo = explode("\r\n",$divido[1]);

            //$empleado=new Empleado($divido[0],$divido[1],$divido[2],$divido[3],$divido[4]);
            $usuario=new Usuario();
            $usuario->nombre=$divido[0];
            $usuario->tipo = trim($ultimo[0]);

            array_push($arrayUsuarios,$usuario);
        }
       fclose($ar);


       $newResponse = $response->withJson($arrayUsuarios, 200);  
       return $newResponse;

    });

    $this->post('/', function (Request $request, Response $response)
    {
        $ArrayDeParametros =$request->getParsedBody();

        $usuario= new Usuario();
        $usuario->nombre=$ArrayDeParametros['nombre'];
        $usuario->tipo = $ArrayDeParametros['tipo'];

        $ar=fopen("./archivos/usuarios.txt","a");

        $dato=$usuario->ToString();

        //agrego "\r\n" al final para el salto de linea
        $valor=fwrite($ar,$dato."\r\n" );

        fclose($ar);

       return $response;
    });

})->add(\Usuario::class . ':VerificarUsario');

$app->run();