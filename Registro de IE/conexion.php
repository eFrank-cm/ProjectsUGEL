<?php
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "dbie";
$db = new mysqli($servidor, $usuario, $password, $nombreBD);

if ($db->connect_error) {
    die("la conexion ha fallado: " . $db->connect_error);
}
if (!$db->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $db->error);
    exit();
}
?>