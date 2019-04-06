<!--Ejercicio 37(Solicitud de empleo) :
Confeccionar un formulario que permita ingresar en una serie de controles de tipo <input>
(type=”text”) el nombre y apellido de una persona, su edad, su dirección, su mail y en un
control de tipo <textarea> su currículum. Mostrar los datos cargados en una nueva página
PHP.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ejercicio 37</title>
</head>
<body>
    <div>
        <form action="Ej37.php" method="post">
            Ingrese nombre:<input type="text" id="txtNombre" name="txtNombre" placeholder="Ingrese nombre..."><br>
            Ingrese apellido:<input type="text" id="txtApellido" name="txtApellido" placeholder="Ingrese apellido..."><br>
            Ingrese direccion:<input type="text" id="txtDireccion" name="txtDireccion" placeholder="Ingrese direccion..."><br>
            Ingrese mail:<input type="email" id="email" name="email" placeholder="Ingrese mail..."><br>
            Ingrese su curriculum:<br>
            <textarea rows=10 cols="30">
            </textarea>

 
        <input type="submit" value="Enviar" id="sub">
        </form>
    </div>
</body>