<?php
/*
En testAuto.php :
 Crear dos objetos “Auto” de la misma marca y distinto color.
 Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
 Crear un objeto “Auto” utilizando la sobrecarga restante.
 Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
 Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
 Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
 Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/
require "Clases21/Auto.php";

//Crear dos objetos “Auto” de la misma marca y distinto color.
$auto1 = new Auto("Renault","verde");
$auto2=new Auto("Renault","Rojo");

//Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
$auto3 = new Auto("BMW","Amarillo",2000);
$auto4= new auto("BMW","Amarillo",1000);

//Crear un objeto “Auto” utilizando la sobrecarga restante
$auto5 = new Auto("Ferrari","Blanco",10000,"22/1/2019");



//Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
//resultado obtenido.
$importe= Auto::Add($auto1,$auto2);
echo "Precios sumados de Auto1 y Auto2:". $importe;


//Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no.
echo "<br><br>Comparo Auto1 con Auto2:" .(int) $auto1->Equals($auto1,$auto2);
echo "<br>Comparo Auto1 con Auto5:" .(int) $auto1->Equals($auto1,$auto5);


//Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,5)
echo "<br><br>Muestro Auto1:<br>";
Auto::MostrarAuto($auto1);

echo "<br>Muestro Auto3:<br>";
Auto::MostrarAuto($auto3);

echo "<br>Muestro Auto5:<br>";
Auto::MostrarAuto($auto5);





?>