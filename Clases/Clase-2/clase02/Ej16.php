<?php
/*Ejercicio 16:
Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
de las letras del Array.
Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
*/

//podemos utilizar la funcion por defecto llamada array_reverse

function InvertirOrden($arrayCaracteres)
{
    $lenght = strlen($arrayCaracteres);

    for($x =0;$x<$lenght/2;$x++){
        $primerLetra = $arrayCaracteres[$x];
        $ultimaLetra = $arrayCaracteres[$lenght-$x-1];
        $arrayCaracteres[$x] = $ultimaLetra;
        $arrayCaracteres[$lenght-$x-1] = $primerLetra;
    }
    return $arrayCaracteres;
   
}

echo InvertirOrden("programacion 3");

/*
invertir_int = new Object[array.length];
        int maximo = array.length;
 
        for (int i = 0; i<array.length; i++) {
            invertir_int[maximo - 1] = array[i];
            maximo--;
*/

?>