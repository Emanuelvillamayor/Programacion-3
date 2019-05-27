<?php

class Test 
{
    public function MostrarInstancia($request,$response,$next)
    {
        $response->getBody()->write("Desde metodo de instancia en clase Test<br>");
        return $next($request,$response);
    }

    public static function MostrarEstatico($request,$response,$next)
    {
        $response->getBody()->write("Desde metodo de estatico en clase Test<br>");
        return $next($request,$response);
    }

}


?>