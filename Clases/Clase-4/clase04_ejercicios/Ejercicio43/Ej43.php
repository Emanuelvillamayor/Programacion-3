<?php

//obtengo direccion a guardar del archivo
$destino = "Archivos/" . $_FILES["archivo"]["name"];

$uploadOk=true;

//obtengo su extencion
$tipoArchivo=pathinfo($destino,PATHINFO_EXTENSION);



//verifico que el archivo no exista para no repetir
if(file_exists($destino) )
{
    echo "El archivo ya existe. Verifique!!!";
    $uploadOk = FALSE;
}

//VERIFICO EL TAMAÑO MAXIMO QUE PERMITO SUBIR
//imagen

if ($_FILES["archivo"]["size"] > 300000 && ($tipoArchivo==="jpg" || $tipoArchivo==="jpeg" || $tipoArchivo==="gif")) 
{
    echo "El archivo para imagen es demasiado grande. Verifique!!!";
    $uploadOk = FALSE;
}

//doc
else if($_FILES["archivo"]["size"] > 60000&& ($tipoArchivo==="doc" || $tipoArchivo==="docx"))
{
    echo "El archivo para .doc o .docx es demasiado grande. Verifique!!!";
    $uploadOk = FALSE;

}
else if($_FILES["archivo"]["size"] > 500000)
{
    echo "El archivo  es demasiado grande. Verifique!!!";
    $uploadOk = FALSE;
}
 



if($uploadOk===false)
{
    echo "<br/>NO SE PUDO SUBIR EL ARCHIVO.";
}
else 
{
	//MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $destino)) {
        echo "<br/>El archivo:<br>Nombre:". basename( $_FILES["archivo"]["name"]). "<br>Extension:".pathinfo($destino,PATHINFO_EXTENSION)."<br>Tamaño:".basename($_FILES["archivo"]["size"]) ." bytes" ."<br> Ha sido subido exitosamente.";
    } else {
        echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
    }

}
