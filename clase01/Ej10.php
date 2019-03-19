<?php
/*Ejercicio 10 :
Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
Luego imprimir (utilizando la estructura for ) cada uno en una línea distinta (recordar que el
salto de línea en HTML es la etiqueta <br/> ). Repetir la impresión de los números utilizando
las estructuras while y foreach 
*/
$array = array();
$i=0;

do
{
    if ($i%2==0)
    {
        array_push($array,$i);
    }
    $i++;

}while(count($array)<10);

//v1 (de mostrar el array "for")
for ($i=0; $i < count($array) ; $i++) 
{
echo  $array[$i]. "<br>" ;
}

//v2 (de mostrar el array "while")


?>