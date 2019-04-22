<?php

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : NULL;

$host ="localhost";
$user="root";
$pass="";
$base="unt2";

switch($opcion)
{
    case 1:
    $con =@mysql_connect($host,$user,$pass);
    if(!$con)
    {
       $sql = "SELECT * FROM `productos` ORDER BY pNombre ASC";

       $rs=mysql_db_query($base,$sql);

       mysql_close($con);
    }

    break;

    default :
    echo "error";
    
}




?>