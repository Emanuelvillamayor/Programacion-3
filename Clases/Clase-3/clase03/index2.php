<?php
/*voy a escribir en el archivo de texto , mi nombre y apellido + la hora min y segundos del momento en que lo 
escribi , y si 2 min despues vuelvo a escribir , me queda el primer registro con la hora actualizada
Utilizamosfuncion date()
*/

//utilizo la "a" ya que mantiene todos los registros , si utilizo "w+" pisa todo
$ar =fopen("Archivos/Minombre2","a");

$nombre = "Emanuel villamayor" ;
$fecha =date("r");
$dato= $nombre . " " . $fecha ;

//pongo \r\n para provocar salto de linea
$flag =fwrite($ar,$dato."\r\n");
if($flag>0)
{
    echo "Dato creado correctamente";
}

fclose($ar);



?>