<?php
require "Clases/Fabrica.php";

$operario1 = new Operario(123456,"Perez","Juan");
$operario2 = new Operario(12345,"Lopez","Ramiro");
$operario3 = new Operario(1234,"Chigo","Lucas");
$operario4 = new Operario(123,"Mard","Jeronimo");
$operario5 = new Operario(12,"Foos","Pedro");
$fabrica = new Fabrica("La Fabrica");
echo "Agrego 5 operarios a la fabrica <br>";
if($fabrica->Add($operario1)){
    echo "Se agrego el operario <br>";
}
if($fabrica->Add($operario2)){
    echo "Se agrego el operario <br>";
}
if($fabrica->Add($operario3)){
    echo "Se agrego el operario <br>";
}
if($fabrica->Add($operario4)){
    echo "Se agrego el operario <br>";
}
if($fabrica->Add($operario5)){
    echo "Se agrego el operario <br>";
}
echo "Agrego operario ya en la fabrica <br>";
if($fabrica->Add($operario1)){
    echo "Se agrego el operario <br>";
}else{
    echo "Error al agregar el operario <br>";
}
echo "Muestro la fabrica: <br>";
echo $fabrica->Mostrar();
echo "Muestro costos:";
echo Fabrica::MostrarCosto($fabrica);
echo "<br>Aumento salario operario1 $20<br>";
$operario1->SetAumentarSalario(20);
echo "Muestro costos:";
echo Fabrica::MostrarCosto($fabrica);
echo "<br>Despido al operario1 <br>";
if($fabrica->Remove($operario1)){
    echo "Se despidio al operario1 <br>";
}else{
    echo "Error al despedir el operario <br>";
}
echo "Intento despedir al operario1 otra vez<br>";
if($fabrica->Remove($operario1)){
    echo "Se despidio al operario1 <br>";
}else{
    echo "Error al despedir el operario <br>";
}

?>