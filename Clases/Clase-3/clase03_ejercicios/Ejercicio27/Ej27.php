<?php
/*Ejercicio 27(Copiar archivos invirtiendo su contenido):
Modificar el ejercicio anterior para que el contenido del archivo se copie de manera invertida,
es decir, si el archivo origen posee ‘Hola mundo’ en el archivo destino quede ‘odnum aloH’.
*/

$direccionInput=$_POST["txtUbicacion"];

//compruebo que exista el archivo pasado
if(file_exists ($direccionInput))
{
//abro el archivo
 $ar = fopen($direccionInput,"r");

 //creo la direccion del archivo a copiar
 $direccion ="Archivos/".date("Y_m_d_H_i_s");

 //creo el archivo a copiar
 $ar2=fopen($direccion,"w");

 while(!feof($ar))
 {
    //obtengo primera linea del archivo original
    $dato= fgets($ar);

    //invierto la linea de el archivo original
    $datoInvertido=InvertirOrden2($dato);
    
    //guardo la linea invertida en el archivo
    
    fwrite($ar2,$datoInvertido); 

    
    
 }


 fclose($ar2);

 echo "Archivo creado con exito!!";

fclose($ar);
}
else
{
    echo "No se encuentra la direccion del archivo";
}




/*Esta forma no funciona
function InvertirOrden($arrayCaracteres)
{
    $lenght = strlen($arrayCaracteres);

    for($x =0;$x<$lenght/2;$x++){
        $primerLetra = $arrayCaracteres[$x];
        $ultimaLetra = $arrayCaracteres[$lenght-$x-1];
        $arrayCaracteres[$x] = $ultimaLetra;
        $arrayCaracteres[$lenght-$x-1] = $primerLetra;
    }
    return $arrayCaracteres;  
}
*/
function InvertirOrden2($arrayCaracteres)
{
    /*
    $array=str_split($arrayCaracteres);

    $arrayFinal=array_reverse($array);

    $cadenaFinal=implode($arrayFinal);

    

    return $cadenaFinal;*/
    $array =explode("\n",$arrayCaracteres);
    $cadenafinal=implode($array);


    return strrev($cadenafinal);
    


}

