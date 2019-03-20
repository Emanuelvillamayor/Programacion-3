<?php
//ARRAY ASOCIATIVO

$coches = array('Audi','Bmw','Ford','Kia');

echo "<br>Muestro utilizando for: <br>";

for ($i=0; $i < count($coches) ; $i++) //se puede utilizar size of es la cantidad de elementos que tiene el array pero  se va a ejecutar tantas veces como el bucle for
{ 
   echo  $coches[$i] . "<br>";
}



/*ES RECOMENDADO usar foreach al recorrer arrays ya que si los indices no llegaran a ser numericos , no se podrian recorrer con un for
es decir en $i tendria que ir alguna cadena o valor que no podriamos adivinarlo , para eso es recomendado usar foreach*/

echo "<br>Muestro utilizando foreach: <br>";

foreach($coches as $marcas)
{
    echo $marcas ."<br>";
}


?>