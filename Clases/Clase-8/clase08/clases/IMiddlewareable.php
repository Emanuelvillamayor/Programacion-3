<?php

Interface IMiddlewareable
{
    public function VerificarUsario($request,$response,$next);
}

?>