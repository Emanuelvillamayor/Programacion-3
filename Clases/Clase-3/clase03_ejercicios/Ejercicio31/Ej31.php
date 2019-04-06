<?php
/*Ejercicio 31 (superficie rectangulo):
Confeccionar un formulario que solicite la medida de los lados de un rectángulo. Luego de
pulsar un botón se mostrará la superficie del mismo:
a- en la misma página.
b- en otra página (con un link para poder volver).
*/

$lado1=$_POST["numLado1"];
$lado2=$_POST["numLado2"];
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

<a href="Ej31_html.php">Volver a pagina anterior</a>