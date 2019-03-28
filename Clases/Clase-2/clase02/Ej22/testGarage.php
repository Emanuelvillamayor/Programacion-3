<?php
/*
En testGarage.php , crear autos y un garage. Probar el buen funcionamiento de todos los
métodos.
*/
require "Clases22/Garage.php";

$garage =new Garage("Carstown",22.2);

echo "Muestro garage solo con datos del garage:<br> ";
echo $garage->MostrarGarage();



$auto1 = new Auto("Ferrari","Blanco",10000,"22/1/2019");
$auto2 = new Auto("Ferrari","Blanco",10000,"22/1/2019");
$auto3 = new  Auto("volskwagen","negro",10000,"22/1/2019");

echo "<br>Intento agregar primer auto:<br>" ;
$garage->Add($auto1) . "<br>";

 echo "<br>Intento agregar segundo  auto (igual al primero):<br>" ;
 $garage->Add($auto2) ."<br>";

 echo "<br>Intento quitar un auto que no esta agregado en el array:<br>";
 $garage->Remove($auto3);

 echo "<br>Muestro garage  con datos del garage +autos:<br> ";
 echo $garage->MostrarGarage();

 echo "<br>Intento quitar un auto que esta agregado en el array o es similar al del array:<br>";
 $garage->Remove($auto1);
?>

