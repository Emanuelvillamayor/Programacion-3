<?php
/*Ejercicio 34 (mostrar fecha):
Realizar una página que permita mostrar el día, mes o año actual, según lo elija el usuario.
Para esto debe utilizar controles de tipo <input> (type=”checkBox”) y un <input>
(type=”button”) para enviar la solicitud al servidor. Mostrar la fecha en la misma página.
*/
$resultado="";
$flag=0;
if(isset($_POST["chbDia"]))
{
   $resultado .= "Dia:" . date("d") ."<br>";
   $flag=1;
}
if(isset($_POST["chbMes"]))
{
    $resultado .= "Mes:" . date("m") ."<br>";
    $flag=1;
}

if(isset($_POST["chbAño"]))
{
    $resultado .= "Año:" . date("Y") ."<br>";
    $flag=1;
}

if($flag>0)
{
    echo $resultado;
}
else
{
    echo "No se selecciono ninguna casilla!!<br>";
}


?>
<br><br><br>
<a href="Ej34_html.php">Volver pagina principal</a>