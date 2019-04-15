<!--Ejercicio 42(galeria de imagenes II) :
Amplíe el ejercicio anterior y permita al usuario añadir múltiples fotos en una misma subida.
Para ello agregar el atributo ‘multiple’ en el input (type=”file”).
Del lado del servidor, verificar que cada archivo subido posea la extensión .jpg o .jpeg y que
su tamaño máximo no supere los 900 kb.
Si alguno de los archivos subidos no cumple con los requisitos expuestos anteriormente,
informarlo, caso contrario, agregarlo a la galería de imágenes.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 42</title>
</head>
<body>
    <div>
       <form action="Ej42.php" method="post" enctype="multipart/form-data">

       Ingrese alguna imagen: <input type="file" name="foto[]" multiple><br>
       <input type="submit" value="Enviar" name="sub"> 

       
        </form> 
    </div>
</body>