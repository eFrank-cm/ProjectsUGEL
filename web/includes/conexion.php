<?php
$servername = "localhost";
$database = "bd_lenguas";
$username = "prueba";
$password = "123456";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Coneccion fallida: " . mysqli_connect_error());
}
echo "Conectado correctamente";
//mysqli_close($conn);
?>