<?php
/*Ejercicio 26:
Generar una aplicación que sea capaz de copiar un archivo de texto (su ubicación se ingresará
por la página) hacia otro archivo que será creado y alojado en
./misArchivos/yyyy_mm_dd_hh_ii_ss.txt , dónde yyyy corresponde al año en curso, mm
al mes, dd al día, hh hora, ii minutos y ss segundos.
*/

//recibo el "value" de la direccion que el usuario va a ingresar por el input de caja de texto
$direccionInput=$_POST["txtUbicacion"];


//compruebo que la direccion del archivo exista
if(file_exists ($direccionInput))
{
//abro el archivo (que me paso el usuario la direccion)
$ar = fopen($direccionInput,"r");
 
//le asigno fecha y hora
 $direccion ="Archivos/".date("Y_m_d_H_i_s");
 //copio el archivo, automaticamente me lo crea
 copy("Archivos/archivo1.txt",$direccion);

 echo "Archivo creado con exito!!";



//cierro el archivo
fclose($ar);

}
else
{
    echo "No se encuentra la direccion del archivo";
}




?>