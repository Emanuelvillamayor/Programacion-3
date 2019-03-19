hola mundo



<?php
 echo "<br>"."hola mundo denuevo";
 


/*Ejercicio 1 :
Realizar un programa que guarde su nombre en $nombre y su apellido en $apellido . Luego
mostrar el contenido de las variables con el siguiente formato: Pérez, Juan. Utilizar el operador
de concatenación (.)
*/
$nombre ="Emanuel";
$apellido = "Villamayor";

echo "<br>" . $nombre ." ".$apellido;

//echo "<br>"."hola 'mundo'";

//echo "<br>"."hola \"mundo\"";


/*Ejercicio 2 : 
Hacer un programa en PHP que sume el contenido de dos variables $x = -3 y $y = 15. Mostrar
el resultado final*/

$x=-3;
$y=15;

echo "<br>".  $x + $y;

/*Ejercicio 3 :
Partiendo del ejercicio anterior, modificar la salida por pantalla para que se visualice el valor de
la variable $x , el valor de la variable $y y el resultado final en líneas distintas (recordar que el
salto de línea en HTML es la etiqueta <br/> 
*/
echo "<br>". $x;
echo "<br>". $y;
echo "<br>". ($x+$y);


/*Ejercicio 4 :
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/
$resultado =0;
$i=0;

do{
$i++;
$resultado= $i +$resultado;

if($resultado<1000)
{
    echo "<br>".$i;
}

}while($resultado<=1000);

/*Ejercicio 5:
Dadas tres variables numéricas de tipo entero $a , $b y $c , realizar una aplicación que muestre
el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
*/

$a=5;
$b=6;
$c=43





/*Ejercicio 7 :
Obtenga la fecha actual del servidor (función date ) y luego imprímala dentro de la página con
distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
año es. Utilizar una estructura selectiva múltiple.
*/


//$fecha = date ("d-m-Y");
//explode busca dentro de una cadena el caracterer que le indico y lo rompe a partir de ese caracter
/* $mes = explode("-",$fecha);

if($mes[1]<="03")
{
    echo "<br>"."es verano" ;
}
if ($mes[1]>"03"&& $mes[1]<=06)
{
    echo "<br>"."es otoño" ;
}
echo "<br>". $fecha;
*/


/*Ejercicio 9 :
Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
función rand ). Mediante una estructura condicional, determinar si el promedio de los números
son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
resultado.
*/

//1-Crear un array vacio 
//2-Usar un for 
//3-Dentro del for cargar el array con la funcion arraypush y rand

$vec;
$sumTotal = 0;
for ($i=0; $i <4 ; $i++) 
{ 
 $vec[$i]=rand();
 $sumTotal +=$vec[$i];
}

if(($sumTotal/5)<6)
{
    echo "<br>" . "Es menor a 6";
}
else if(($sumTotal/5)==6)
{
    echo "<br>" . "Es igual a 6";
}
else
{
    echo "<br>" . "Es mayor a 6";
}



?>