<?php

//OBTENGO TODOS LOS NOMBRES DE LOS ARCHIVOS
$nombres = $_FILES["foto"]["name"];

//OBTENGO TODOS LOS TAMAÑOS DE LOS ARCHIVOS
$sizes = $_FILES["foto"]["name"];

//INDICO CUALES SERAN LOS DESTINOS DE LOS ARCHIVOS SUBIDOS Y SUS TIPOS
$destinos = array();
$tiposArchivo = array();
foreach($nombres as $nombre)
{
	$destino = "Archivos/" . $nombre;
	array_push($destinos, $destino);
	array_push($tiposArchivo, pathinfo($destino, PATHINFO_EXTENSION));
}

$uploadOk=true;


//VERIFICO QUE LOS ARCHIVOS NO EXISTAN
foreach($destinos as $destino){
	if (file_exists($destino)) {
		echo "El archivo {$destino} ya existe. Verifique!!!<br>";
		$uploadOk = FALSE;
		break;
	}
}


//VERIFICO LOS TAMAÑOS MAXIMOS QUE PERMITO SUBIR
foreach($sizes as $size){
	if ($size > 900000) {
		echo "Archivo demasiado grande. Verifique!!!<br>";
		$uploadOk = FALSE;
		break;
	}
}

//VERIFICO SI ES UNA IMAGEN O NO

//OBTIENE EL TAMAÑO DE UNA IMAGEN, SI EL ARCHIVO NO ES UNA
//IMAGEN, RETORNA FALSE
$tmpsNames = $_FILES["foto"]["tmp_name"];
$i=0;
foreach($tmpsNames as $tmpName){
	
	$esImagen = getimagesize($tmpName);

	if($esImagen === FALSE) {//NO ES UNA IMAGEN

        //SOLO PERMITO CIERTAS EXTENSIONES
        echo "Solo son permitidos archivos con imagenes !<br>";
        $uploadOk=false;

	}
	else {// ES UNA IMAGEN

		//SOLO PERMITO CIERTAS EXTENSIONES
		if($tiposArchivo[$i] != "jpg" && $tiposArchivo[$i] != "jpeg" ) {
			echo "Solo son permitidas imagenes con extension JPG, JPEG<br>";
			$uploadOk = FALSE;
			break;
		}
	}
	$i++;
}


//VERIFICO SI HUBO ALGUN ERROR, CHEQUEANDO $uploadOk
if ($uploadOk === FALSE) {

    echo "<br/>NO SE PUDIERON SUBIR LOS ARCHIVOS.<br>";

} 
else 
{
	//MUEVO LOS ARCHIVOS DEL TEMPORAL AL DESTINO FINAL
	for($i=0;$i<count($tmpsNames);$i++){
		if (move_uploaded_file($tmpsNames[$i], $destinos[$i])) {
			echo "<br/>El archivo ". basename( $tmpsNames[$i]). " ha sido subido exitosamente.";
		} else {
			echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo ". basename( $tmpsNames[$i]).".";
		}
	}


    
//agrego el destino de la imagen al txt
for($i=0;$i<count($destinos);$i++)
{
    Agregar($destinos[$i]);

}


//leo el contenido de txt para poder traer las imagenes neuvamente y mostrarlas
$array=leer();
/*
$array=dir("Archivos");
$directory="Archivos";
*/
echo "<table border=1>";

for($i=0 ;$i< count($array); $i++)
{
    echo "<tr>";
    echo "<td>" . "<img width=100 height=100 src='" . $array[$i]. "'/>" ."<br>" ."</td>";
    echo "</tr>";
}

/*
while (($archivo = $array->read()) !== false)
    { echo "<tr>";
        echo '<img width=100 height=100 src="'.$directory."/".$archivo.'">'."\n";
        echo "</tr>";

    }
    $array->close();
    */
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
<a href="Ej42_html.php"></a>