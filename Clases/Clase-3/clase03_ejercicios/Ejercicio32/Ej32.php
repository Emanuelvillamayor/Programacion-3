<?php
/*Ejercicio 32 (superficie rectangulo):
Modificar el formulario del ejercicio anterior para disponer de dos controles de tipo <input>
(type=”radio”) que permita seleccionar entre calcular la superficie y el perímetro del
rectángulo.
El resultado se mostrará:
a- en la misma página.
b- en otra página (con un link para poder volver).
*/

$lado1=$_POST["numLado1"];
$lado2=$_POST["numLado2"];

//obtengo el "value" del input "raddio"
$rdb=$_POST["rdb"];

if($rdb=="superficie")
{
    echo "Superficie:" . ($lado1*$lado2) . "<br>"; 
}
else
{
    echo "Perimetro:" . (($lado1*2)+($lado2*2)) . "<br>"; 
}

$resultado="";

for($i=0;$i<$lado1;$i++)
 {
    for($j=0;$j<$lado2;$j++)
       {
          $resultado .= "*";
       }
        $resultado.="<br>";
}

echo $resultado;


?>

<a href="Ej32_html.php">Volver a pagina anterior</a>