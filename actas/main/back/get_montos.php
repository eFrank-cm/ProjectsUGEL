<?php
include('conexion.php');

$boleta_per = $_POST; // explode_keys('; ', $_POST['array'])

$montos = array();
$rem_total = 0;
$des = 0;

if(!empty($boleta_per)){
    $id = $boleta_per['n'];
    $query = "SELECT * FROM monto WHERE n=$id";
    $result = $db -> query($query);

    // recolectar montos
    $codigos_keys_tmp = array();
    while($row = $result->fetch_array()){
        $monto = array(
            'id_m' => $row['id_m'],
            'cod' => $row['cod'],
            'monto' => $row['monto'],
            'n' => $row['n']
        );
        array_push($montos, $monto);
        array_push($codigos_keys_tmp, $row['cod']);

        // sumar montos
        if($monto['cod'] > 0){
            $rem_total += $monto['monto'];
        }else{
            $des += $monto['monto'];
        }
    }


    // recolectar codigos
    $cod_result = $db->query("SELECT * FROM codigo");
    $codigos_value = array();
    $codigos_keys = array();
    while($row = $cod_result->fetch_array()){
        if(in_array($row['cod'], $codigos_keys_tmp)){
            array_push($codigos_value, $row['tag']);         
            array_push($codigos_keys, $row['cod']);
        }
    }

    $codigos = array_combine($codigos_keys, $codigos_value);
    $montos = array_map(
        function($array) use($codigos, $codigos_keys){
            $cod = $array['cod'];
            $monto = $array['monto'];
            if(in_array($cod, $codigos_keys)){
                $nombre = $codigos[$cod];
            }else{
                $nombre = '-';
            }
            return array($cod, $nombre, $monto);
        },
        $montos
    );
}

// completa a un arreglo de 12
$montos_2 = array(array(), array(), array());
for($i = 0; $i < 36; $i++){
    $element = array($i, '-', '-');
    if($i < count($montos)){
        $element = $montos[$i];
    }
    
    if($i < 12){
        array_push($montos_2[0], $element);
    }
    elseif($i < 24){
        array_push($montos_2[1], $element);
    }
    else{
        array_push($montos_2[2], $element);        
    }
}



?>

