<?php
/*Ejercicio 6:
Escribir un programa que use la variable $operador que pueda almacenar los símbolos
matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2 . De acuerdo al
símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
resultado por pantalla.
*/

$operador = '-';
$op1 = 24;
$op2 =4;

//v1
switch ($operador) 
{
    case '+':
      echo "Suma : ",($op1+$op2);       
      break;
    
    case '-':
       echo "Resta : ",($op1-$op2);
       break;

    case '*':
    echo "Multiplicacion : ",($op1*$op2);
       break;    

    case '/':
    echo "Division : ",($op1/$op2);
       break;

    default:
        echo "<br> Ingrese un operador aritmetico correspondiente";
        break;
}

//v2
/*
if(strcmp($operador, '+')==0)
{
    echo "Suma : ",($op1+$op2);
}
else if(strcmp($operador, '-')==0)
{
    echo "Resta : ",($op1-$op2);
}
else if (strcmp($operador, '*')==0)
{
    echo "Multiplicacion : ",($op1*$op2);
}
else
{
    echo "Division : ",($op1/$op2);
}
*/

?>