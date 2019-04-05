<?php
// "\n" en el ascci aparece con un "10"-> es decir "nueva linea"
// "\r" en el ascci aparece con un "13" -> es decir "retorno de carro"

//prueba uno , tres variables sin salto de linea
/*
$cadena1="hola1";
$cadena2="hola2";
$cadena3="hola3";

$ar = fopen("Archivos/prueba1","w");

fwrite($ar,$cadena1);
fwrite($ar,$cadena2);
fwrite($ar,$cadena3);

fclose($ar);
*/

//Prueba dos , variables con "\n"
/*
$cadena1="hola1\n";
$cadena2="hola2\n";
$cadena3="hola3\n";

$ar = fopen("Archivos/prueba2","w");

fwrite($ar,$cadena1);
fwrite($ar,$cadena2);
fwrite($ar,$cadena3);

fclose($ar);

*/


//Prueba tres , variables con "\r"
/*
$cadena1="hola1\r";
$cadena2="hola2\r";
$cadena3="hola3\r";

$ar = fopen("Archivos/prueba3","w");

fwrite($ar,$cadena1);
fwrite($ar,$cadena2);
fwrite($ar,$cadena3);

fclose($ar);
*/


//Prueba cuatro , variables con "\r\n"
/*
$cadena1="hola1\r\n";
$cadena2="hola2\r\n";
$cadena3="hola3\r\n";


$ar = fopen("Archivos/prueba4","w");

fwrite($ar,$cadena1);
fwrite($ar,$cadena2);
fwrite($ar,$cadena3);

fclose($ar);

*/

//Desde el caso 2 al caso 4 se pueden ver igual en los "Archivos"






$arrayInicial = str_split($cadena);
$lenghtInicial=count($arrayInicial);

$arrayEncriptado=[];

$cadenaEncriptada="";

for($i=0;$i<$lenghtInicial;$i++)
{
  //le sumo los 200 en el codigo ascii al caracter
  $ord =ord($arrayInicial[$i])+200;

  //cardo caracter en el array
  array_push($arrayEncriptado,$ord);

 
}
$cadenaEncriptada=implode($arrayEncriptado);


echo $cadenaEncriptada;
//caso inverso

$arrayInicial2=str_split($cadenaEncriptada);
$lenghtInical2=count($arrayInicial2);

$arrayDesencriptado=[];

$cadenaDesencriptada="";

for($j=0;$j<$lenghtInical2;$j++)
{
    for($j=0;$j<3;$j++)
    {
       
    }
    $ord2=ord($arrayInicial2[$i]);
    $chr2=chr($ord2);

    array_push($arrayDesencriptado,$chr2);

    
}
$cadenaDesencriptada=implode($arrayDesencriptado);

echo "<br>".$cadenaDesencriptada;

?>
