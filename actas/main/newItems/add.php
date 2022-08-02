<?php include('../back/conexion.php'); ?>
<?php

if(!empty($_POST['codMod']) and !empty($_POST['nombres']) and empty($_POST['condicion'])){
    $codMod = $_POST['codMod'];
    $nombres = $_POST['nombres'];
    $condicion = $_POST['condicion'];
    $query = "INSERT INTO persona (id_p, codMod, nombres, condicion) VALUE ( ,'$codMod','$nombres','$condicion')";
    echo $query;
}

echo "se guardo correctamente";
?>