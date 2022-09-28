<?php
include('conexion.php');

$boleta_per = $_POST; // explode_keys('; ', $_POST['array'])

$montos = array();
$rem_total = 0;
$des = 0;

if(!empty($boleta_per)){
    $id = $boleta_per['n'];
    $query = "SELECT * FROM `monto` WHERE n=$id ORDER BY tipo DESC, tag ASC"; //;SELECT * FROM `monto` WHERE n=3286 ORDER BY tipo DESC, tag ASC;
    $result = $db -> query($query);

    // recolectar montos
    $codigos_keys_tmp = array();
    while($row = $result->fetch_array()){
        $a = 0;
        $monto = array(
            'id_m' => $row['id_m'],
            'tipo' => $row['tipo'],
            'tag' => $row['tag'],
            'monto' => floatval($row['monto']),
            'n' => $row['n']
        );
        array_push($montos, $monto);
        //array_push($codigos_keys_tmp, $row['cod']);
        array_push($codigos_keys_tmp, $row['tag']);

        // sumar montos
        if($monto['tipo'] == 1){
            $rem_total += $monto['monto'];
        }
        else if ($monto['tipo'] == -1){
            $des += $monto['monto'];
        }
    }


    // recolectar codigos
    $cod_result = $db->query("SELECT * FROM codigo");
    $codigos_value = array();
    $codigos_keys = array();
    while($row = $cod_result->fetch_array()){
        if(in_array($row['tag'], $codigos_keys_tmp)){
            array_push($codigos_value, $row['tag']);         
            array_push($codigos_keys, $row['tag']);
        }
    }

    $codigos = array_combine($codigos_keys, $codigos_value);
    $montos = array_map(
        function($array) use($codigos, $codigos_keys_tmp){
            $tipo = $array['tipo'];
            $cod = $array['tag'];
            $monto = $array['monto'];
            if(in_array($cod, $codigos_keys_tmp)){
                $nombre = $cod;
            }else{
                $nombre = '-';
            }
            return array($tipo, $nombre, $monto);
        },
        $montos
    );
}

// completa a un arreglo de 12
$montos_2 = array(array(), array(), array());
$ingresos=array(); $egresos=array();
foreach ($montos as $elem) 
{
    if($elem[0]==1){array_push($ingresos,$elem);}
    else{array_push($egresos,$elem);}    
}

$neg=array(24,25,26,27,28,29,30,31,32,33,34,35,36);
$neg_vcs = count($egresos); $contador=0;
for($i = 0; $i < 36; $i++){
    $element = array($i, '-', '-');
    if($i < count($ingresos)){
        $element = $ingresos[$i];
    }
    if(!empty($egresos) && in_array($i, $neg,true)){
        if ($neg_vcs != $contador)
        {
            $element = $egresos[$contador];
            $contador++;
        }
        else{
            $element = array($i, '-', '-');
        }
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

$rem_liquida = $rem_total - $des;
?>


