<?php
class Jugador {
    private $nombre;
    private $equipo;
    public function __construct() {
        //obtengo un array con los parámetros enviados a la función
        $params = func_get_args();
        //saco el número de parámetros que estoy recibiendo
        $num_params = func_num_args();
        //cada constructor de un número dado de parámetros tendrá un nombre de función
        //atendiendo al siguiente modelo construct1() construct2()...
        $funcion_constructor ='construct'.$num_params;
        //compruebo si hay un constructor con ese número de parámetros
        if (method_exists($this, $funcion_constructor)) {
        //si existía esa función, la invoco, reenviando los parámetros que recibí en el constructor original
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }

    //ahora declaro una serie de métodos constructores que aceptan diversos números de parámetros
    public function construct0() {
        echo "Hola, soy el constructor al que no se le pasa parámetros <br>";
    }

    public function construct1($nombre) {
        echo "Hola, soy el constructor al que se le pasa el parámetro \$nombre = $nombre <br>";
    }

    public function construct2($nombre, $equipo) {
        echo "Hola, soy el constructor al que se le pasa el parámetro \$nombre = $nombre y \$equipo = $equipo<br>";
    }

 
}
?>