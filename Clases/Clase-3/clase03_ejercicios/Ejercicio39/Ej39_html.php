<!--Ejercicio 39(informacion del numero) :
Construya una aplicación que permita el ingreso de un número entero y muestre en pantalla la
siguiente información:
1) Cantidad de cifras que posee.
2) Suma de cifras impares del número.
3) Suma de cifras pares del número.
4) Suma total de todas las cifras del número.
5) Todos los divisores de dicho número.
Mostrar los anteriores datos en una tabla convenientemente diseñada.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 37</title>
</head>
<body>
    <div>
        <form action="Ej39.php" method="post">
        <input type ="number" id="num" name="num" min="0" placeholder="Solo numeros enteros...">
        <input type="submit" value="Enviar" id="sub">
        </form>
    </div>
</body>