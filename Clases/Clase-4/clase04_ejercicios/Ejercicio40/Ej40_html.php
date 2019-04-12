<!--Ejercicio 40(generar tabla de imagenes) :
Generar una tabla que posea fotos en un tamaño de 100x100 píxeles y que al pulsar se
muestre la foto en su tamaño original en una página distinta (agregarle un link para poder
volver a la página de inicio).
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 40</title>
</head>
<body>
    <div>
       <form action="Ej40.php" method="post" enctype="multipart/form-data">
       <!--
        <input type ="file" id="num" name="archivo" width="100" height="100">
        <input type="submit" value="Enviar" id="sub">
        --> 
  
       <input type="image" name="imgApple" vale="imgApple" src="./Imagenes/apple.jpg" alt="Envair dato" width="100" height="100">
       
        </form> 
    </div>
</body>