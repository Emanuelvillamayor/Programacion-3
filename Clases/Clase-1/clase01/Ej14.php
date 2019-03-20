<?php

$lista = array('Animales' =>array("Perro","Gato","Raton","Araña"), 
               'Fechas'   =>array("1986","1996","2015","78","86"),
               'Lenguajes'=>array("php","mysql","html15","typescript","ajax"));


/*vamos a ver "Perro" , le ponemos el "0" ya que las claves en este caso son numericos no tiene claves de cadenas entonces
el 0 representa el primer valor del subarray 'Animales'*/
 echo $lista['Animales'][0] ."<br> <br>"; 
                            
 /*Voy a mostrar el contenido de la $Lista*/
foreach($lista as $cont=>$subCont)
{
    echo $cont.": <br>";

    foreach($subCont as $info)
    {
        echo $info ."<br>";
    }
    echo "<br>";
}

?>