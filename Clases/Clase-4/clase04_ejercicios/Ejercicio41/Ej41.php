<?php

//obtengo direccion a guardar del archivo
$destino = "Archivos/" . $_FILES["foto"]["name"];

$uploadOk=true;

//obtengo su extencion
$tipoArchivo=pathinfo($destino,PATHINFO_EXTENSION);




//verifico que el archivo no exista para no repetir
if(file_exists($destino))
{
    echo "El archivo ya existe. Verifique!!!";
    $uploadOk = FALSE;
}

//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
if ($_FILES["foto"]["size"] > 50000000) {
    echo "El archivo es demasiado grande. Verifique!!!";
    $uploadOk = FALSE;
}

//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
//IMAGEN, RETORNA FALSE
$esImagen = getimagesize($_FILES["foto"]["tmp_name"]);

if($esImagen==false)
{
    echo "Solo son permitidos archivos con extension jpg,jpeg,png!";
    $uploadOk=false;

}


if($uploadOk===false)
{
    echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";
}
else 
{
	//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)) {
        echo "<br/>El archivo ". basename( $_FILES["foto"]["name"]). " ha sido subido exitosamente.";
    } else {
        echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
    }

    
//agrego el destino de la imagen al txt
Agregar($destino);

//leo el contenido de txt para poder traer las imagenes neuvamente y mostrarlas
$array=leer();

echo "<table border=1>";

for($i=0 ;$i< count($array); $i++)
{
    echo "<tr>";
    echo "<td>" . "<img width=100 height=100 src='" . $array[$i]. "'/>" ."<br>" ."</td>";
    echo "</tr>";
}

echo "</table>";


}



//FUNCIONES
function Agregar($direccion)
{
    if(file_exists("imagenes.txt"))
    {
        $ar=fopen("imagenes.txt","a");

        $valor=fwrite($ar,$direccion."\r\n");

        fclose($ar);

    }
    
}

function Leer()
{
    $retorno=[];


    $ar=fopen("imagenes.txt","r");


    while(!feof($ar))
    {
        $cadena=fgets($ar);
        if($cadena=="")
        {
            continue;
        }
        array_push($retorno,$cadena);

    }

    fclose($ar);


    return $retorno;
}

?>

<a href="Ej41_html.php"></a>