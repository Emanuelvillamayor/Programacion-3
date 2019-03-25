<?php
/*La clase FiguraGeometrica posee: todos sus atributos protegidos, un constructor por defecto,
un método getter y setter para el atributo _color , un método virtual ( ToString ) y dos
métodos abstractos: Dibujar (público) y CalcularDatos (protegido).
CalcularDatos será invocado en el constructor de la clase derivada que corresponda, su
funcionalidad será la de inicializar los atributos _superficie y _perimetro.
Dibujar, retornará un string (con el color que corresponda) formando la figura geométrica del
objeto que lo invoque (retornar una serie de asteriscos que modele el objeto).*/

 abstract class FiguraGeometrica
{
    #atributos
    protected $_color;
    protected $_perimetro;
    protected $_superficie;

    #constructor
    public function __construct()
    {
        //hex
        $this->_color="009900";

       //ingles
       // $this->_color="green";
        

        $this->_perimetro=0.0;
        $this->_superficie=0.0;
    }

    #metodos get y set
    public function Get_Color()
    {
        return $this->_color;
    }

    public function Set_Color($_color)
    {
        $this->_color =$_color;
    }

    #metodos

    public function ToString()
    {
        return "Color:". $this->Get_Color()."<br>Perimetro: ".$this->_perimetro ."<br>Superficie:".$this->_superficie;
    }

    #metodos abstractos
    public abstract function Dibujar();
    protected abstract function CalcularDatos();







}

?>