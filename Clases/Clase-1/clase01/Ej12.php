<?php
/*Ejercicio 12 :
Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
contenga como elementos: ‘ color’ , ‘ marca’ , ‘ trazo’ y ‘ precio’ . Crear, cargar y mostrar tres
lapiceras.
*/

$lapicera1 = array('color'=>"rojo" ,'marca'=>"sylvapen" ,'trazo'=>"fino" , 'precio'=>20 );
$lapicera2 = array('color'=>"verde" ,'marca'=>"faber castell" ,'trazo'=>"grueso" , 'precio'=>50 );
$lapicera3 = array('color'=>"negro" ,'marca'=>"bic" ,'trazo'=>"fino" , 'precio'=>10 );



/*Al querer acceder a un array asociativo en este caso no se puede acceder al INDICE "0" "$lapicera[0]" 
 aunque sepamos que en la posicion "0" se encuentra la clave de 'color' , entonces para poder acceder al "0" debemos
 hacer "$lapicera['color'] , ya que 'color' es el que se encuentra al principio
 */
echo "Muestro solo un valor de una determinada clave de lapicera: ";
echo "<br>" . $lapicera1['color'] ."<br>"; //mostramos el "indice 0" en el cual es el string 'color' cargado con el string "rojo"


echo "<br>Muestro \$lapicera1: <br>";
foreach($lapicera1 as $content)
{
    echo $content . "<br>";
}


echo "<br>Muestro \$lapicera2: <br>";
foreach($lapicera2 as $content)
{
    echo $content . "<br>";
}


echo "<br>Muestro \$lapicera3: <br>";
foreach($lapicera3 as $content)
{
    echo $content . "<br>";
}

echo "<br>Muestro todo lo de \$lapicera1 con var_dump: <br>";
var_dump(($lapicera1));//muestro todo




?>