<?php
/*Ejercicio 7 :
Obtenga la fecha actual del servidor (función date ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/

//obtengo la fecha
$fecha = date ("d-m-Y");

//v1 (para obtener la estacion)
 $mes = explode("-",$fecha);//explode busca dentro de una cadena el caracterer que le indico y lo separa en bloques  a partir de ese caracter (-)

if($mes[1]<="03")
{
    echo " Es verano" ;
}
else if ($mes[1]>"03"&& $mes[1]<="06")
{
    echo " Es otoño" ;
}
else if ($mes[1]>"06"&& $mes[1]<="09")
{
    echo " Es invierno" ;
}
else 
{
    echo "Es primavera" ;
}
echo "<br>". $fecha;



//v2 (para obtener la estacion)
/*$mes2 = date("m"); //solo guardamos el mes

if($mes2<="03")
{
    echo " Es verano" ;
}
else if ($mes2>"03"&& $mes2<="06")
{
    echo " Es otoño" ;
}
else if ($mes2>"06"&& $mes2<="09")
{
    echo " Es invierno" ;
}
else 
{
    echo "Es primavera" ;
}

echo "<br>". $fecha;
*/

?>