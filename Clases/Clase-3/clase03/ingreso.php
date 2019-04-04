<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <div>
 <!--action =pagina donde interactuamos con la clase =testPersona-->
  <form action="ex4.php" method="post" >
  
  Ingrese su nombre:<input type="text" name="nombre" id="nombre"><br>
  Ingrese su apellido:<input type="text" name="apellido" id="apellido"><br>
  <!--submit toma todo el contenido de form y lo envia alaction -->
  <input type="submit" name="enviar" id="enviar" value="enviar"><br>
  <!--Resetea todos los valores-->
  <input type="reset" name="limpiar" id="limpiar" value="limpiar"><br>



  </form>
 </div>

    
</body>
</html>


