<!--Ejercicio 35 (empresa de turismo):
Una empresa de turismo ofrece cinco destinos: Río de Janeiro, Punta del Este, La Habana,
Miami e Ibiza. Se pide hacer una página que posea un <select> con los cinco destinos y un
botón que le permita al usuario ver el valor del viaje.
Los valores de los viajes son: €900, €550, €1000, €1250 y €1500 respectivamente.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 35</title>
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