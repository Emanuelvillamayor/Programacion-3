<?php
/*Ejercicio 13:
Cargar los tres arrays con los siguientes valores y luego ‘juntarlos’ en uno. Luego mostrarlo por
pantalla.
“Perro”, “Gato”, “Ratón”, “Araña”, “Mosca”
“1986”, “1996”, “2015”, “78”, “86”
“php”, “mysql”, “html5”, “typescript”, “ajax”
*/

/* v1 de cargar arrays
$array1 = array("Perro", "Gato", "Ratón", "Araña", "Mosca");
$array2 = array("1986","1996","2015","78","86");
$array3 = array("php","mysql","html15","typescript","ajax");
*/
$array1 = array();
array_push($array1,"Perro","Gato","Raton","Araña"); //cargo valores con array_push

$array2 = array();
array_push($array2,"1986","1996","2015","78","86");//cargo valores con array_push

$array3 = array();
array_push($array3 , "php","mysql","html15","typescript","ajax");//cargo valores con array_push


$arrayFinal = array_merge($array1,$array2,$array3); //junto los 3 arrays en 1 con array_merge


echo "Muestro contenido de \$array1: <br>";
foreach($array1 as $cont)
{
    echo $cont . "<br>";
}

echo "<br>Muestro contenido de \$array 2: <br>";
foreach($array2 as $cont)
{
    echo $cont . "<br>";
}


echo "<br>Muestro contenido de \$array3: <br>";
foreach($array3 as $cont)
{
    echo $cont . "<br>";
}

echo "<br>Muestro contenido de \$arrayFinal: <br>";
foreach($arrayFinal as $cont)
{
    echo $cont . "<br>";
}

echo "<br>Muestro utilizando var_dump : <br>";
var_dump($array1);
echo "<br>";
var_dump($array2);
echo "<br>";
var_dump($array3);
echo "<br>";
var_dump($arrayFinal);





?>