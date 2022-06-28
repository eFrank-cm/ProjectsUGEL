<?php
$servidor= "localhost";
$usuario= "root";
$password = "";
$nombreBD= "bd_conta";
$conn = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($conn->connect_error) {
    die("la conexión ha fallado: " . $conn->connect_error);
}
if (!$conn->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
} else {
    // printf("Conjunto de caracteres actual: %s\n", $db->character_set_name());
}
?>