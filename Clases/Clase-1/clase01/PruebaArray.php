<?php
//Array multidimensional


/*
Usuario:  
  nombre  
  genero 
  profesion

Usuario:
  nombre
  genero
  profesion   


*/

//forma de crear un solo array
//$persona = array('nombre'=>"Cristina",'genero'=>"Femenino",'profesion'=> "Estudiante");

//lista de personas
//crearmos el array multidimensional para guardar otros arrays que contengan esos datos
//los arrays de por dentro son asociativos pero el array que los contiene no es asociativo ya que no creamos nuestros indices
//entonces para acceder al primer array de la lista utilizaremos el valor "0"
//Transformamos los arrays dentro de $lista en arrays ASOCIATIVOS al ponerles 'usuario 1' y 'usuario 2'}
//por lo tanto al acceder a cualquiera de estos array no utilizaremos int sino que lo haremos con su respectiva CLAVE
$lista = array('Usuario 1:' => array('nombre'=>"Cristina",'genero'=>"Femenino",'profesion'=> "Estudiante"),
               'Usuario 2:' =>array('nombre'=>"Mario",'genero'=>"Masculino",'profesion'=> "Ingeniero")
              );



echo $lista[0]; // Si solo hacemos esto vamos a acceder a TODO el primer array pero nada en especifico entonces da ERROR



//echo "<br>". $lista[0]['nombre'] ."<br>"; //aqui accedemos al primer array(sin tener clave string) y obtenemos el valor que en este caso posee la clave 'nombre'
echo "<br>". $lista['Usuario 1:']['nombre'] ."<br>";//aqui accedemos al primer array (mediante su clave) y obtenemos el valor que en este caso posee la clave 'nombre'



echo "Muestro directamente los arrays que contiene el array \$lista <br> <br>";
foreach($lista as $user=>$info)
{
  echo $user ."<br>"; //si solo hacemos esto nos va a dar el index (CLAVE) de los arrays que contiene $lista es decir como contiene 2 arrays nos devuelve 'Usuario 1 y 2'


 // echo $info ."<br>"; //si solo hacemos esto no sabra a que clave acceder ya que hay muchas dentro del array

   foreach($info as $content)//con este foreach accederemos a los valores de los array que contiene la sub lista
   {
     echo $content ."<br>";
   }
   echo "<br>";
}






?>