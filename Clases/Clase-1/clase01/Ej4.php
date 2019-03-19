<?php
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
?>