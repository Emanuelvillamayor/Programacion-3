<!--Ejercicio 33:
Solicitar el ingreso de una clave dos veces, es decir, disponer dos controles de tipo <input>
(type=”password”), luego en el servidor, verificar si las claves ingresadas son iguales o no,
mostrando un mensaje de bienvenida en la página welcome.php, si son iguales o redireccionar
hacia la página de inicio, en el caso de que sean distintos.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 33</title>
</head>
<body>
    <div>
        <form action="Ej33.php" method="post">
        <input type="password" id="pass1" name="pass1">
        <input type="password" id="pass2" name="pass2">
        <input type="submit" value="Enviar" id="sub">
        </form>
    </div>
</body>