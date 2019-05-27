<?php

$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : NULL;
$pais = isset($_POST['pais']) ? $_POST['pais'] : NULL;

$auxtipo=false;
$auxPais=false;

if(isset($_POST["tipo"]) && isset($_POST["pais"]))
{
    $auxtipo=true;
    $auxPais=true;
    echo "pais y tipo";
}
else if(isset($_POST["tipo"]))
{
    $auxtipo=true;
    echo " tipo";
}
else if(isset($_POST["pais"]))
{
    $auxPais=true;
    echo "pais";
}

?>