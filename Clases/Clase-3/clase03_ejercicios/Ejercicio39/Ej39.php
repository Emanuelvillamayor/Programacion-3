<?php
/*Ejercicio 39 (Información del Número):
Construya una aplicación que permita el ingreso de un número entero y muestre en pantalla la
siguiente información:
1) Cantidad de cifras que posee.
2) Suma de cifras impares del número.
3) Suma de cifras pares del número.
4) Suma total de todas las cifras del número.
5) Todos los divisores de dicho número.
Mostrar los anteriores datos en una tabla convenientemente diseñada.
*/

$num =$_POST["num"];

echo "<table border=1>";
echo "<tr>";
echo "<td>Cantidad Cifras</td><td>" . CantidadCifras($num) ."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Suma Impares</td><td>" . SumaImpares($num) . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Suma Pares</td><td>" . SumaPares($num) . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Suma Cifras</td><td>" . SumaCifrasNumero($num) . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Divisores</td><td>" . DivisoresNumero($num) . "</td>";
echo "</tr>";
echo "</table>";




//1)
function CantidadCifras($num)
{
    return strlen($num);
}

//2)
function SumaPares($num)
{
    $par=0;

for ($i=0;$i<=$num;$i++)
{
    if (($i%2)==0)
    {
        $par=$par+$i;
    }
}
return $par;

}

//3)
function SumaImpares($num)
{
$impar=0;

for ($i=0;$i<=$num;$i++)
{
    if (($i%2)==0)
    {
    }
    else
    {
        $impar=$impar+$i;
    }
}
return $impar;
}

//4)
function SumaCifrasNumero($num)
{
    $arrayCifras =str_split($num);
    $sumaCifras=0;

    for($i=0 ;$i<count($arrayCifras);$i++)
    {
      $sumaCifras=$sumaCifras+$arrayCifras[$i];
    }

    return $sumaCifras;
}

//5)
function DivisoresNumero($num)
{
    $divisores="";

   for($i = 1; $i < $num; $i ++) 
   {

      if ($num % $i == 0) 
      {
        $divisores .= $i . " ";
      }
   }

   return $divisores;
}
?>

