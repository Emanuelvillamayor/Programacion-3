<?php
/*Ejercicio 5:
Dadas tres variables numéricas de tipo entero $a , $b y $c , realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

$a=5;
$b=6;
$c=4;

if($a < $b && $b < $c)
{
    echo "El valor de medio es: " . $b . "... <br>";
}
else if($b < $a && $a < $c)
{
    echo "El valor de medio es: " . $a . "... <br>";
}
else if($a < $c && $c < $b)
{
    echo "El valor de medio es: " . $c . "... <br>";
} 
else 
{
    echo "No existe valor medio...";
}


?>