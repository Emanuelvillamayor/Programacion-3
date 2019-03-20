<?php
/*Ejercicio 11 :
Imprima los valores del vector asociativo siguiente usando la estructura de control foreach :
$v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
*/


//v1 de cargar array
$v[1]=90; $v[30]=7;  $v['e']=99;  $v['hola']='mundo';

//v2 de cargar array
//$v = array(1=>90 ,30=>7 ,'e'=>99 ,'hola'=>'mundo');


echo "Muestro utilizando var_dump: <br>";
var_dump($v);//de esta forma lo imprime listando lo que tiene el array y de que tipo es cada cosa (clave y valor)

echo "<br> <br> Muestro utilizando \"foreach\": <br>";
foreach($v as $var)
{
    echo $var . "<br>";
}



?>