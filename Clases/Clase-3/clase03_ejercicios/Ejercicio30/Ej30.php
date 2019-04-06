<?php
/*Ejercicio 30:
Utilizando tags de Html (<table>, <tr> y <td>) se pide generar en forma dinámica una tabla.
Dicha tabla se formará a partir de los valores de dos controles de tipo <select>. Cada uno de
estos controles contendrá valores desde el 1 hasta el 50.
Al pulsar el control <input> (type=”button”) con la leyenda “Generar Tabla”, se invocará a un
procedimiento que creará la tabla a partir de la cantidad seleccionada de filas y columnas.
*/

$filas = $_POST["selectFilas"];
$columnas =$_POST["selectColumnas"];

echo "<table border=1>";

for($fila=1;$fila<=$filas;$fila++)
{
    echo "<tr>";
    for($columna=1;$columna<=$columnas;$columna++)
    {
        echo "<td>Fila $fila , Columna $columna </td>"; 
    }
    echo "</tr>";

}

echo "</table>";
?>
<a href="Ej30_html.php">Volver a pagina anterior</a>