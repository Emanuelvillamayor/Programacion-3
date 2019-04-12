<!--Ejercicio 41(galeria de imagenes) :
Amplíe el ejercicio de la galería de fotos realizada anteriormente y permita al usuario añadir
nuevas fotos. Para ello hay que poner el atributo enc_type=”multipart/form-data” en el FORM y
usar la variable $_FILES['foto'].
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 41</title>
</head>
<body>
    <div>
       <form action="Ej41.php" method="post" enctype="multipart/form-data">

       Ingrese alguna imagen: <input type="file" name="foto"><br>
       <input type="submit" value="Enviar" name="sub"> 

       
        </form> 
    </div>
</body>