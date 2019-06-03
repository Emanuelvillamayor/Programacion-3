<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

require_once './vendor/autoload.php';

//require_once '/clases/AccesoDatos.php';
//require_once '/clases/cd.php';
require_once './clases/Usuario.php';
require_once './clases/middleware.php';
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



$app->post('/crear', function (Request $request, Response $response) 
{   

    //datos que vamos a guardar en el payload
    $user= new stdClass();
    $user->nombre="ema";
    $user->apellido="villamayor";
    $user->division="3A";

    $ahora=time();

    //creamos el payload pasandole un usuario
    $payload = array(
       // 'iat'=>$ahora,  OPCIONALES
     //   'exp'=>$ahora+100, OPCIONALES
        'data'=>$user,
        'app'=>"API REST 2019",
    );

    //retornamos el jwt con la clave
   $token = JWT::encode($payload,"miClaveSuperSecreta");

    return $response->withJson($token,200);

});

$app->post('/verificar', function (Request $request, Response $response) 
{
    $ArrayDeParametros=$request->getParsedBody();
    $token = $ArrayDeParametros['token'];

    if(empty($token)  || $token==="")
    {
        throw new Exception("El token esta vacio!");
    }

    try
    {
        $decodificado=JWT::decode(
            $token,
            //tenemos que pasarle la clave tambien con la que lo guardamos
            "miClaveSuperSecreta",
            ['HS256']
        );

    }
    catch(Exception $e)
    {
        throw new Exception ("Token no valido!!! -->" .$e->getMessage() );
    }

    return "Token OK!!";

});

$app->post('/obtenerPayload', function (Request $request, Response $response) 
{
    $ArrayDeParametros=$request->getParsedBody();
    $token = $ArrayDeParametros['token'];

    if(empty($token)  || $token==="")
    {
        throw new Exception("El token esta vacio!");
    }

    try
    {
        
        $decodificado=JWT::decode(
            $token,
            //tenemos que pasarle la clave tambien con la que lo guardamos
            "miClaveSuperSecreta",
            ['HS256']
        );

        //obtengo los datos del usuario que venian dentro del JWT en el atributo propio "data"
        $usuario= $decodificado->data;
    }
    catch(Exception $e)
    {
        throw new Exception ("Token no valido!!! -->" .$e->getMessage() );
    }

   
 return  $response->withJson($usuario,200);

});

$app->group('/JWT', function () 
{

    $this->post('/verificar', function ($request, $response, $args) 
    {
        $ArrayDeParametros=$request->getParsedBody();

        $nombre=$ArrayDeParametros['nombre'];
        $apellido=$ArrayDeParametros['apellido'];
        $division =$ArrayDeParametros['division'];

        $usuario = new Usuario($nombre,$apellido,$division);

        if(Usuario::Verificar($usuario))
        {
            //creamos el payload con los datos del usuario
            $payload = array(
                 'data'=>$usuario
             );
         
             //retornamos el jwt con la clave
            $token = JWT::encode($payload,"miClaveSuperSecreta");
         
             return $response->withJson($token,200);

        }
        else
        {
            $objJson= new stdClass();
            $objJson->mensaje="Error , usuario erroneo";
            return $response->withJson($objJson,409);
        }

        //el ultimo add va a ser el primero en ejecutarse
    })->add(\Middleware::class . '::MiddlewareDos')->add(\Middleware::class . '::MiddlewareUno');

    $this->post('/mostrar', function ($request, $response, $args) 
    {
        $ArrayDeParametros=$request->getParsedBody();

        $objJson = new stdClass();
        $objJson->mensaje="";

        $token = $ArrayDeParametros['token'];

        if(empty($token)  || $token==="")
        {
           $objJson->mensaje="el token esta vacio";
        }

        try
        {
            
            $decodificado=JWT::decode(
                $token,
                //tenemos que pasarle la clave tambien con la que lo guardamos
                "miClaveSuperSecreta",
                ['HS256']
            );

            //obtengo los datos del usuario que venian dentro del JWT en el atributo propio "data"
          echo Usuario::TraerListado();
        }
        catch(Exception $e)
        {
          $objJson->mensaje=$e->getMessage();
        }

    
        return  $response->withJson($usuario,200);


    });


});

$app->run();