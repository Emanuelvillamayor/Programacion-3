<?php
$vec= array();
$sumTotal = 0;

for ($i=0; $i <4 ; $i++) 
{ 
 array_push($vec,rand(0,10));
 $sumTotal +=$vec[$i];
}

if(($sumTotal/5)<6)
{
    echo "<br>" . "Es menor a 6";
}
else if(($sumTotal/5)==6)
{
    echo "<br>" . "Es igual a 6";
}
else
{
    echo "<br>" . "Es mayor a 6";
}



/*Otra forma de hacerlo basica
for ($i=0; $i <4 ; $i++) 
{ 
 $vec[$i]=rand();
 $sumTotal +=$vec[$i];
}*/

?>