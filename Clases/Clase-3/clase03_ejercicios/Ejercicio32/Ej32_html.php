<!--Ejercicio 32:
Modificar el formulario del ejercicio anterior para disponer de dos controles de tipo <input>
(type=”radio”) que permita seleccionar entre calcular la superficie y el perímetro del
rectángulo.
El resultado se mostrará:
a- en la misma página.
b- en otra página (con un link para poder volver).
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 32</title>
</head>
<body>
    <div>
        <form action="Ej32.php" method="post">
        Ingrese lado 1 :<input type="number" id="numLado1" name="numLado1"><br>
        Ingrese lado 2 :<input type="number" id="numLado2" name="numLado2"><br>
        Superficie:<input type ="radio" id="rdb" name="rdb" value="superficie" checked><br>
        Perimetro:<input type ="radio" id="rdb" name="rdb" value="perimetro"><br>
        <input type="submit" value="Enviar" id="sub">

            
        </form>
    </div>
</body>
