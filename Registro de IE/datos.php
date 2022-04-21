<?php  
include('template/head.php'); 
include('backend/conexion.php');
include('backend/verplanilla.php');
?>

<?php

foreach($planilla as $a => $b){
    if (count($b)==0){
        continue;
    }
    echo $a;
    echo "<br>";
    foreach($b as $c){
        echo "{$c['cargo']} {$c['nombre']}";
        echo "<br>";
    }
    echo "<br><br>";
}

?>

<?php include('template/footer.php') ?>