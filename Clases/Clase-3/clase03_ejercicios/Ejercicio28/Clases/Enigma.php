<?php
/*Ejercicio 28(Encriptar / Desencriptar archivos):
Crear la clase Enigma, la cual tendrá la funcionalidad de encriptar/desencriptar los mensajes.
Su método estático Encriptar , recibirá un mensaje y a cada número del código ASCII de cada
carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un
archivo de texto (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar
correctamente el archivo encriptado, FALSE, caso contrario.
El método estático Desencriptar , recibirá sólo el path de dónde se leerá el archivo. Realizar el
proceso inverso para restarle a cada número del código ASCII de cada carácter leído 200, para
poder retornar el mensaje y ser mostrado desesncriptado.
*/

class Enigma
{
    #Metodos Estaticos

    /*Método estático Encriptar , recibirá un mensaje y a cada número del código ASCII de cada
      carácter del string le sumará 200. Una vez que cambie todos los caracteres, lo guardará en un
      archivo de texto (el path también se recibirá por parámetro). Retornará TRUE si pudo guardar
      correctamente el archivo encriptado, FALSE, caso contrario.*/

    public static function Encriptar($cadena,$path)
    {
        //divido el array en una cadena
        $arrayInicial = str_split($cadena);
        $lenghtInicial=count($arrayInicial);

        $arrayEncriptado=[];

        $cadenaEncriptada="";

        for($i=0;$i<$lenghtInicial;$i++)
        {
          //le sumo los 200 en el codigo ascii al caracter
          $ord =ord($arrayInicial[$i])+200;

          //paso ese caracter sumado en formato "ascii" a formato "cadena"
          $chr=chr($ord);

          array_push($arrayEncriptado,$chr);

          $cadenaEncriptada=implode($arrayEncriptado);
          
        }
        

    }

}


?>