<?php

 class Empleado
 {
     #Atributos

     public $apellido;
     public $nombre;
     public $legajo;
     public $sueldo;
     public $path_foto;

     #Constructor

     function __construct($legajo,$apellido,$nombre,$sueldo,$path)
     {
         $this->apellido=$apellido;
         $this->nombre=$nombre;
         $this->legajo=$legajo;
         $this->sueldo=$sueldo;
         $this->path_foto=$path;
     }

     #Metodo Instancia

     public function ToString()
     {   
        //return "$this->apellido-$this->nombre-$this->legajo-$this->sueldo-$this->path_foto\r\n";
        return $this->apellido . "-" . $this->nombre."-".$this->legajo . "-" . $this->sueldo . "-" . $this->path_foto . "\r\n";
     }

     public function TraerTodos()
     {

        $retorno=[];

        $ar=fopen("empleados.txt","r");

        while(!feof($ar))
        {
            $cadena=fgets($ar);

            if($cadena=="")
            {
                continue;
            }

            $divido=explode("-",$cadena);

           

            $empleado=new Empleado($divido[0],$divido[1],$divido[2],$divido[3],$divido[4]);



            array_push($retorno,$empleado);
        }
       fclose($ar);

       return $retorno;
     }
     

     #Metodo Clase

     public function Agregar($empleado)
     {

        $ar=fopen("empleados.txt","a");

        $dato=$empleado->ToString();

        $valor=fwrite($ar,$dato);

        fclose($ar);
     }


 }

?>
