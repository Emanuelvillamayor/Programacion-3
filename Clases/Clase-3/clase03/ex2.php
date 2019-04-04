<?php

/*
fopen y fgets me devuelva el contenido y con el echo veo el contenido del archivo en la pantalla 
*/

$ar= fopen("Archivos/Minombre.txt","r");

//le paso el tamaño total con el filesize para que sepa lo que tiene que leer
   $contenido= fread($ar,filesize("Archivos/Minombre.txt"));

   //no funciona porque el fread termina al final de la linea y si uso solo el fgets va a leer solo el final
  $contenido2= fgets($ar);
   
echo "Leo el archivo desde fread():";
echo $contenido . "<br>";
echo "Leo el archivo desde fgets() pero el anterior fread quedo en el final de la linea del archivo:";
echo $contenido2 . "<br>";
fclose($ar);





$ar2= fopen("Archivos/Minombre.txt","r");

echo "Leo el archivo desde fgets() , vuelvo a abrir el archivo: ";
$conteido3=fgets($ar2);

echo $conteido3;

fclose($ar2);
?>