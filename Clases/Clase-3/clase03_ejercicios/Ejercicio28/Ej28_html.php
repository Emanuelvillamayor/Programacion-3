<!--Ejercicio 28(Encriptar/Desencriptar archivos):
Crear una página web que permita encriptar mensajes y que se guarden en un archivo de texto
y que sólo si se lee el archivo desde la página se podrá acceder a su texto claro, es decir se
desencriptará.
Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar , recibirá un mensaje y a cada número del código ASCII de cada
carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un
archivo de texto (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar
correctamente el archivo encriptado, FALSE, caso contrario.
El método estático Desencriptar , recibirá sólo el path de dónde se leerá el archivo. Realizar el
proceso inverso para restarle a cada número del código ASCII de cada carácter leído 200, para
poder retornar el mensaje y ser mostrado desesncriptado.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 28</title>
</head>
<body>
    <div>
        <form action="Ej27.php" method="post">
            Ingrese ubicacion del archivo de texto:<Input type ="text" name="txtUbicacion" id="txtUbicacion" placeholder="Ingrese ubicacion..."><br>
            <input type="submit" name="enviar" id="enviar" value="Enviar">
        </form>
    </div>
</body>       