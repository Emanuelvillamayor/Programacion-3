<?php
/*Ejercicio 17: (Validar palabra)
Crear una función que reciba como parámetro un string ( $palabra ) y un entero ( $max ). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
1 si la palabra pertenece a algún elemento del listado.
0 en caso contrario.
*/

//creo la funcion
function ValidarPalabra($palabra , $max)
{
    $retorno =0;
  if(strlen($palabra)==$max)
  {
    if(strcmp($palabra,"Recuperatorio")==0 ||strcmp($palabra,"Parcial")==0 || strcmp($palabra,"Programacion")==0)
    {
     $retorno=1;
    }
 
  }

  return $retorno;
}

 
#casos de error
 echo "El resultado incorrecto da :".ValidarPalabra("hola",4). "<br>";
 echo "El resultado incorrecto da :".ValidarPalabra("hola",2). "<br>";
 echo "El resultado incorrecto da :".ValidarPalabra("Recuperatorio",2). "<br>";

 echo"<br> <br>";

#casos correctos
 echo "El resultado correcto da :".ValidarPalabra("Programacion",12). "<br>";
 echo "El resultado correcto da :".ValidarPalabra("Recuperatorio",13). "<br>";
 echo "El resultado correcto da :".ValidarPalabra("Parcial",7). "<br>";





?>