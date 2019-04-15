<!--Ejercicio 43(files Upload) :
Se necesita crear una página que le permita al usuario subir al servidor web cualquier tipo de
archivo. Sólo se restringirá el tamaño de cada archivo según el tipo de extensión que posea.
Para archivos con extensión .doc o .docx el tamaño máximo será de 60 Kb.
Archivos con extensión .jpg, jpeg o gif el valor máximo será de 300 kb.
Para el resto de las extensiones el máximo permitido será de 500 kb.
Dichos archivos se almacenarán en una carpeta llamada ‘Uploads’ que se ubicará en el
directorio raíz del servidor web.
Se deberá informar si se logró subir el archivo o no. Si se pudo, informar el nombre del archivo,
su extensión y que tamaño posee.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 43</title>
</head>
<body>
    <div>
       <form action="Ej43.php" method="post" enctype="multipart/form-data">

       Ingrese alguna archivo: <input type="file" name="archivo" ><br>
       <input type="submit" value="Enviar" name="sub"> 

       
        </form> 
    </div>
</body>