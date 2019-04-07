<?php
/*Ejercicio 37:
Confeccionar un formulario que permita ingresar en una serie de controles de tipo <input>
(type=”text”) el nombre y apellido de una persona, su edad, su dirección, su mail y en un
control de tipo <textarea> su currículum. Mostrar los datos cargados en una nueva página
PHP.
*/

$nombre = $_POST["txtNombre"];
$apellido=$_POST["txtApellido"];
$direccion =$_POST["txtDireccion"];
$email=$_POST["email"];
$curriculum=$_POST["curriculum"];

echo "Nombre:$nombre<br>Apellido:$apellido<br>Direccion:$direccion<br>Email:$email<br>Curriculum:$curriculum";



?>
<br><br><br>

<a href="Ej37_html.php"></a>