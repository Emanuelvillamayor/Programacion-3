<?php
/*Ejercicio 23:
*/
require "Clases/Vuelo.php";
/*
$pasajero1 = new Pasajero("lucas","villalba","42395106",true);
$pasajero2 = new Pasajero("lucas","villalba","42395106",true);

$pasajero3 =new Pasajero("emiliano","montoya","40895674",false);

echo "Comparo dos pasajeros iguales: " .(int) $pasajero1->Equals($pasajero2) . "<br><br>";

echo "Comparo dos pasajeros distintos: " .(int) $pasajero1->Equals($pasajero3) . "<br><br>";

echo "Muestro primero Pasajero:<br>"; 
Pasajero::MostrarPasajero($pasajero1);

echo "<br>Muestro tercer Pasajero:<br>";
Pasajero::MostrarPasajero($pasajero3);
*/

$pasajero1 = new Pasajero("Jorda","Damian",1234567,true);
$pasajero2 = new Pasajero("Gimenez","Ezequiel",4568791,false);
$pasajero3 = new Pasajero("Messi","Leonel",8796458,false);
$pasajero4 = new Pasajero("Maradona","Diego",234,false);
$pasajero5 = new Pasajero("","Hulk",0000000,true);
$vuelo1 = new Vuelo("Aerolineas",100,2);
$vuelo2 = new Vuelo("flybondi",10,3);
echo "Agrego pasajero al vuelo1: ";
echo (int)$vuelo1->AgregarPasajero($pasajero1) . "<br>";
echo "<br>Agrego pasajero al vuelo1: ";
echo (int)$vuelo1->AgregarPasajero($pasajero2) . "<br>";
echo "<br>Agrego pasajero al vuelo1 , error cantidad maxima 2: ";
echo (int)$vuelo1->AgregarPasajero($pasajero3) . "<br>";
echo "<br>Agrego pasajero al vuelo2: ";
echo (int)$vuelo2->AgregarPasajero($pasajero3) . "<br>";
echo "<br>Agrego pasajero al vuelo2: ";
echo (int)$vuelo2->AgregarPasajero($pasajero4) . "<br>";
echo "<br>Agrego pasajero al vuelo2: ";
echo (int)$vuelo2->AgregarPasajero($pasajero5) . "<br>";
echo "<br>Agrego pasajero al vuelo2 , error cantidad maxima 3: ";
echo (int)$vuelo2->AgregarPasajero($pasajero2) . "<br>";
echo "<br>Agrego pasajero repetido al vuelo2 , error repetido: ";
echo (int)$vuelo2->AgregarPasajero($pasajero4) . "<br>";

echo "<br>Muestro informacion vuelo1: <br>";
echo $vuelo1->MostrarVuelo();
echo "<br>Muestro informacion vuelo2 <br>";
echo $vuelo2->MostrarVuelo();
echo "<br>Mostrar recaudado: <br>";
echo Vuelo::Add($vuelo1,$vuelo2) . "<br>";
echo "<br>Se borra un pasajero vuelo1 <br>";
Vuelo::Remove($vuelo1,$pasajero1);
echo "<br>Se vuelve a borrar el mismo pasajero vuelo1 <br>";
Vuelo::Remove($vuelo1,$pasajero1);
echo "<br>Muestro informacion vuelo1 <br>";
echo $vuelo1->MostrarVuelo();
echo "<br>Muestro informacion vuelo2 <br>";
echo $vuelo2->MostrarVuelo();


?>