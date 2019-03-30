<?php
require "Clases/Operario.php";
class Fabrica
{
    #Atributos

    private $_cantMaxOperarios;
    private $_operarios;
    private $_razonSocial;

    #Constructor

    function __construct($rs)
    {
        $this->_cantMaxOperarios=5;
        $this->_operarios=[];
        $this->_razonSocial=$rs;
    }

    #Metodos Instancia

    private function RetornarCostos()
    {
        $retorno=0;
        foreach($this->_operarios as $operario)
        {
          $retorno+= $operario->GetSalario();
        }
        return $retorno;
    }

    private function MostrarOperarios()
    {
        $retorno="";
        foreach($this->_operarios as $operario)
        {
            $retorno= $retorno . Operario::Mostar($operario);
            $retorno =$retorno . "<br>";
        }
        return $retorno;
    }

    public function Mostrar()
    {
        return "Fabrica: $this->_razonSocial, Operarios: <br>".$this->MostrarOperarios();
    }

    public function Add($operario)
    {
        $retorno = false;

        if((Fabrica::Equals($this->_operarios,$operario)==0 )&& (count($this->_operarios)+1 <= $this->_cantMaxOperarios))
        {
           array_push($this->_operarios,$operario);
            $retorno=true;
        }
        return $retorno;
    }

    public function Remove($operario)
    {
        $retorno = false;

        if(Fabrica::Equals($this->_operarios,$operario)==1)
        {
            array_splice($this->_operarios,array_search($operario,$this->_operarios),1);
            $retorno=true;
        }
        return $retorno;
    }
    #Metodos de Clase

    public static function MostrarCosto($fabrica)
    {
      return $fabrica->RetornarCostos();
    }

    public static function Equals($fabrica,$operario)
    {
     $retorno = false;
     foreach($fabrica as $op)
     {
         if($op->Equals($op,$operario))
         {
             $retorno=true;
         }
     }
     return $retorno;
    }




}
?>