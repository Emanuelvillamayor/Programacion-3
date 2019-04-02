<?php
/*Vamos a generar una variable vamos  a guardar nombre y apellido y despues escribir en archivo de texto ,
  el contenido de esa variable,abr en modo escritura y cierro el archivo;
*/

 $nombreApellido ="Emanuel Villamayor";

 $recurso=fopen("Archivos/Minombre.txt","w");

    $cantidad = fwrite($recurso,$nombreApellido);
    if($cantidad>0)
    {
        echo "Archvio creado EXITOSAMENTE";
    }
    else {
        echo "Archvio creado Con ERROR";
    }
  


fclose($recurso);


?>