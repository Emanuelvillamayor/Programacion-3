<!--Ejercicio 31:
Confeccionar un formulario que solicite la medida de los lados de un rectángulo. Luego de
pulsar un botón se mostrará la superficie del mismo:
a- en la misma página.
b- en otra página (con un link para poder volver).
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 31</title>
</head>
<body>
    <div>
        <form action="Ej31.php" method="post">
        Ingrese lado 1 :<input type="number" id="numLado1" name="numLado1"><br>
        Ingrese lado 2 :<input type="number" id="numLado2" name="numLado2"><br>
        <input type="submit" value="Enviar" id="sub">

            
        </form>
    </div>
</body>
