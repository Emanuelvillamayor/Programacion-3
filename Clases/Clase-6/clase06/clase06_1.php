<?php

try
{
    $conStr='mysql:host=localhost;dbname=cdcol;charset=utf8';
    $objPDO=new PDO($conStr,"root","");
  
    $objQuery= $objPDO->query("SELECT * FROM cds");

    $arrayFetch= $objQuery->fetchAll();

    foreach ($arrayFetch as $row) 
    {
        //Muestro con nombres de columna
        echo $row['titel'] . "----";
        echo $row['interpret'] . "----";
        echo $row['jahr'] . "----";
        echo $row['id'];

    /*
        echo $row[0] . "----";
        echo $row[1] . "----";
        echo $row[2] . "----";
        echo $row[3];
        echo "<br>";
    */ 
     }

   // var_dump($arrayFetch);


 

}
catch(PDOEXCEPTION $e)
{
    echo "¡Error!: " . $e->getMessage() . "<br/>";
}




?>