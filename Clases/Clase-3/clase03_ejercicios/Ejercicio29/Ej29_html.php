<!--Ejercicio 29 (cambio de color de fondo II):
Realizar una página que posea sólo un control <select> (lista de opciones), con seis nombres
de colores como opciones (y su correspondiente código RGB como valor asociado), y un control
<input> (type=”button”) con la leyenda “Cambiar Color”.
La funcionalidad de la aplicación es sencilla, se selecciona un color del combo, se pulsa el botón
y el color de fondo de la página cambia a dicho color.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 29</title>
</head>
<body>
    <div>
        <form action="Ej29.php" method="post">
          Elija un color: <br>  <select id="select" name ="select">
                <option value="FF0000">Rojo</option>
                <option value="00FF00">Verde</option>
                <option value="0000FF">Azul</option>
                <option value="FFFF33">Amarillo</option>
                <option value="000000">Negro</option>
                <option value="FF8D07">Naranja</option>
            </select> <br>   
            Cambiar Color:<br><input type="submit" id="btnColor"  value="Enviar">
            
        </form>
    </div>
</body>       