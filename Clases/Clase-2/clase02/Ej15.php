<?php
/*Ejercicio 15 :(Potencia de Numeros)
Mostrar por pantalla las primeras 4 potencias de los números del uno 1 al 4 (hacer una función
que las calcule invocando la función pow */

//creo la funcion
function PotenciaNumero()
{
    for($i=1;$i<=4;$i++)
    {
        //v2
        echo "Potencia numero:".$i."<br>";
        for($j=1;$j<=4;$j++)
        {
            echo pow($i,$j)."<br>";
        }
        echo "<br>";

        
        /*v1
        echo "Potencia numero:".$i."<br>";
 
        echo pow($i,1)."<br>";
        echo pow($i,2)."<br>";
        echo pow($i,3)."<br>";
        echo pow($i,4)."<br>";

        echo "<br>";
        */
    }
} 

//invoco a la funcion
PotenciaNumero();


?>