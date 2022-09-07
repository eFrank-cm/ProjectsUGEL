<?php
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$nombreBD = 'bd_conta';
$db = new mysqli($servidor, $usuario, $password, $nombreBD);

// Verificar la bd
if ($db->connect_error) {
    die("la conexion ha fallado: " . $db->connect_error);
}

// Verificar los caracteres utf8
if (!$db->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $db->error);
    exit();
}


// FUNCIONES
function explode_keys($sep, $str){
    $per = array();
    foreach(explode($sep, $str) as $i){
        $tmp = explode('=', $i);
        $per[$tmp[0]] = $tmp[1];
    }
    return $per;
}

function implode_keys($sep, $array) {
    return implode($sep, array_map(
        function($k, $v){ return $k . '=' . $v;},
        array_keys($array),
        array_values($array)
        )
    );
}

?>