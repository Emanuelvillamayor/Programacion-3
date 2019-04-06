<!--Ejercicio 34 (mostrar fecha):
Realizar una página que permita mostrar el día, mes o año actual, según lo elija el usuario.
Para esto debe utilizar controles de tipo <input> (type=”checkBox”) y un <input>
(type=”button”) para enviar la solicitud al servidor. Mostrar la fecha en la misma página.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 34</title>
</head>
<body>
    <div>
        <form action="Ej34.php" method="post">
            Dia<input type="checkbox"  name="chbDia" id="chbDia"><br>
            Mes<input type="checkbox" name="chbMes" id="chbMes"><br>
            Anio<input type="checkbox"  name="chbAño" id="chbAño"><br>
 
        <input type="submit" value="Enviar" id="sub">
        </form>
    </div>
</body>