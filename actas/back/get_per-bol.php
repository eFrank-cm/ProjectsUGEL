<?php 
include('conexion.php');

$personas_boletas = array();
$kw = "";
if(isset($_POST) and array_key_exists('keyword', $_POST)){
    $keyword = $kw = $_POST['keyword'];
    $query = "SELECT * FROM persona INNER JOIN boleta ON persona.id_p = boleta.id_p WHERE nombres LIKE '%$keyword%' or codMod LIKE '%$keyword%'";
    $result = $db->query($query);

    //var_dump($result);
    while($row = $result->fetch_array()){
        $per_bol = array(
            'codMod' => $row['codMod'],
            'nombres' => $row['nombres'],
            'condicion' => $row['condicion'],
            'n'=> $row['n'],
            'fecha' => $row['fecha'],
            'codPlanilla' => $row['codPlanilla'],
            'anulado' => $row['anulado'],
        );
        array_push($personas_boletas, $per_bol);
    }
}

$personas = array();
if(isset($_POST) and array_key_exists('add', $_POST)){
    $result =  $db->query("SELECT * FROM persona");

    while($row = $result -> fetch_array()){
        $per = array(
            'id_p' => $row['id_p'],
            'codMod' => $row['codMod'],
            'nombres' => $row['nombres'],
            'condicion' => $row['condicion']
        );
        array_push($personas, $per);
    }

    echo "<pre>";
    print_r($personas);
    echo "</pre>";
}

// out: $personas_boletas
// out: $personas
?>