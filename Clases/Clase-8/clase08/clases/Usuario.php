<?php
require_once "IMiddlewareable.php";
class Usuario implements IMiddlewareable
{
    #atributos
    public $tipo;
    public $nombre;

    #metodos instancia
    public function ToString()
    {
        return $this->nombre . "-" . $this->tipo;
    }

    public function VerificarUsario($request,$response,$next)
    {
        //este flag va a validar si se va a ejecutar el "next" de la api
        $flag=false;
    
        //valido por donde viene si por "get" o por "Post"
        if($request->isGet())
        {
           // $response->getBody()->write("Viene por Get<br>");
           // $response->getBody()->write("Viene por ".$request->getMethod() . "<br>");
        }
        if($request->isPost())
        {
            $objJson= new stdClass();
            $objJson->Exito=false;
            $objJson->Mensaje="Error , no es admin ";

           // $response->getBody()->write("Viene por Post<br>");
            $response->getBody()->write("Viene por ".$request->getMethod() . "<br>");
    
            //recupero datos de tipo y nombre desde POST
            $ArrayDeParametros = $request->getParsedBody();
            $tipo = $ArrayDeParametros['tipo'];
            $nombre = $ArrayDeParametros['nombre'];
    
            //muestro esos datos que recupero por POST
    
            //valido que el tipo sea "admin"
            if($tipo=="admin")
            {
                $objJson->Exito=true;
                $objJson->Mensaje ="El tipo es admin , Nombre: " . $nombre . "=> LLEGA A EL VERBO<br>";
                $response= $response->withJson($objJson,200);
            }
            else
            {

                $response=$response->withJson($objJson,403);
                $newResponse=$response;
                $flag=true;
            }
        }
    
        //ejecuto la API
        if($flag==false)
        {
            $newResponse=$next($request,$response);
        }
    
        return $newResponse;
    }

}



?>