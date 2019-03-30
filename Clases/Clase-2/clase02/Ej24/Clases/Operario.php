<?php
/*
Métodos getters y setters (en Operario ):
GetSalario: Sólo retorna el salario del operario.
Neiner, Maximiliano PHP- 2019 Página 6
SetAumentarSalario: Sólo permite asignar un nuevo salario al operario. La asignación
consiste en incrementar el salario de acuerdo al porcentaje que recibe como parámetro.
Constructores: realizar los constructores para cada clase (Fabrica y Operario) con los
parámetros que se detallan en la imagen.
En la clase Fabrica, la cantidad máxima de operarios será inicializada en 5.
Métodos (en Operario )
GetNombreApellido (de instancia): Retorna un String que tiene concatenado el nombre y el
apellido del operario separado por una coma.
Mostrar (de instancia): Retorna un String con toda la información del operario. Utilizar el
método GetNombreApellido .
Mostrar (de clase): Recibe un operario y retorna un String con toda la información del
mismo (utilizar el método Mostrar de instancia)
Crear el método de instancia “Equals” que permita comparar al objeto actual con otro de tipo
Operario. Retronará un booleano informando si el nombre, apellido y el legajo de los operarios
coinciden al mismo tiempo.
Métodos (en Fabrica )
RetornarCostos (de instancia, privado): Retorna el dinero que la fábrica tiene que gastar en
concepto de salario de todos sus operarios.
MostrarOperarios (de instancia, privado): Recorre el Array de operarios de la fábrica y
muestra el nombre, apellido y el salario de cada operario (utilizar el método Mostrar de
operario).
MostrarCosto (de clase): muestra la cantidad total del costo de la fábrica en concepto de
salarios (utilizar el método RetornarCostos ).
Crear el método de clase “Equals”, recibe una Fabrica y un Operario. Retronará un booleano
informando si el operario se encuentra en la fábrica o no. Reutilizar código.
Add (de instancia): Agrega un operario al Array de tipo Operario , siempre y cuando haya
lugar disponible en la fábrica y el operario no se encuentre ya ingresado. Reutilizar código.
Retorna TRUE si pudo ingresar al operario, FALSE, caso contrario.
Remove (de instancia): Recibe a un objeto de tipo Operario y lo saca de la fábrica, siempre y
cuando el operario se encuentre en el Array de tipo Operario. Retorna TRUE si pudo quitar al
operario, FALSE, caso contrario.
Crear los objetos necesarios en testFabrica.php como para probar el buen funcionamiento de
las clases.
*/

class Operario
{
#Atributos

private $_nombre;
private $_apellido;
private $_legajo;
private $_salario;

#Metodos Get y Set

public function GetSalario()
{
    return $this->_salario;
}

public function GetNombreApellido()
{
    return $this->_nombre .",". $this->_apellido;
}

public function SetAumentarSalario($porcentaje)
{
 $this->_salario += $this->_salario * $porcentaje;
}

#Constructor

function __construct($legajo,$apellido,$nombre)
{
    $this->_legajo=$legajo;
    $this->_apellido=$apellido;
    $this->_nombre=$nombre;
    $this->_salario =100;
}


#Metodos de Instancia
 public function Mostrar()
 {
     return $this->GetNombreApellido() . "Salario:".$this->GetSalario() . "Legajo:" . $this->_legajo;
 }

 public function Equals($operario1 , $operario2)
 {
     $retorno = false;

     if($operario1->_nombre === $operario2->_nombre && $operario1->_apellido === $operario2->_apellido && $operario1->_legajo === $operario2->_legajo)
     {
         $retorno =true;
     }
     return $retorno;
 }


 #Metodos de Clase
 public static function Mostar($operario)
 {
  return $operario->Mostrar();
 }
}

?>