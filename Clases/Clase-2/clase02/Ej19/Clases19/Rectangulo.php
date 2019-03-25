<?php
//agrego referencia
require_once "Clases19/FiguraGeometrica.php";
class Rectangulo extends FiguraGeometrica
{
    #Atributos
    private $_ladoDos;
    private $_ladoUno;


    #Constructor
    public function __construct($l1,$l2)
    {
        parent::__construct();

        $this->_ladoUno=$l1;
        $this->_ladoDos=$l2;
        $this->CalcularDatos();
    }


    #Metodos

    protected function CalcularDatos()
    {
      $this->_perimetro=($this->_ladoUno*2) + ($this->_ladoDos * 2);
      $this->_superficie=($this->_ladoUno * $this->_ladoDos);
    }

   public function Dibujar()
    {
        $retorno ='<div style="color :#'.$this->Get_Color().'">'; //pongo los colores hexadecimal
        //   $retorno ='<div style="color :'.$this->_color.'">'; //pongo los colores ingles 
        
            for($i=0;$i<$this->_ladoUno;$i++)
            {
                for($j=0;$j<$this->_ladoDos;$j++)
                {
                    $retorno.= "*";
                }
                $retorno.="<br>";
            }
        
        return $retorno;

    }

    public function ToString()
    {
        return parent::ToString() ."<br>Lado Uno:".$this->_ladoUno."<br>Lado Dos:".$this->_ladoDos. $this->Dibujar();
    }

}

?>