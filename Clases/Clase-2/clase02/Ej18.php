<?php
/*Ejercicio 18: (Par e Impar)
Crear una función llamada EsPar que reciba un valor entero como parámetro y devuelva TRUE
si este número es par ó FALSE si es impar.
Reutilizando el código anterior, crear la función EsImpar.
*/

//creo funcion Par
function EsPar($valor)
{
    $retorno = false;
    if ($valor%2==0)
    {
        $retorno=true;
    }
        return $retorno;
}

//creo funcion Impar y reutilizo codigo
function EsImpar($valor)
{
    return !(EsPar($valor));
}

//Utilizo la funcion
echo "Funcion Par:<br>";
echo "Le paso un valor correcto:". EsPar(10);
echo "<br>Le paso un valor incorrecto:" .(int)EsPar(9) ; //convierto a int porque el "false" no me lo muestra en la pagina

echo"<br><br>Funcion Impar:<br> ";
echo "Le paso un valor correcto:". EsImpar(9);
echo "<br>Le paso un valor incorrecto:" .(int) EsImpar(10);//convierto a int porque el "false" no me lo muestra en la pagina

?>