<?php
/*Ejercicio 33:
Solicitar el ingreso de una clave dos veces, es decir, disponer dos controles de tipo <input>
(type=”password”), luego en el servidor, verificar si las claves ingresadas son iguales o no,
mostrando un mensaje de bienvenida en la página welcome.php, si son iguales o redireccionar
hacia la página de inicio, en el caso de que sean distintos.
*/

$clave1=$_POST["pass1"];
$clave2=$_POST["pass2"];


if($clave1==$clave2)
{
    //si la clave es correcta me dirijo a la pagina welcome.php
    header("location:welcome.php");
}
else
{
    //si la clave es incorrecta vuelvo a la pagina inicial    
    header("location:Ej33_html.php");
}
?>