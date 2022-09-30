<?php include('../back/conexion.php'); ?>
<?php

$isDt_per = (!empty($_POST['codMod']) and !empty($_POST['apPaterno']) and !empty($_POST['apMaterno']) and !empty($_POST['nombres']) and !empty($_POST['condicion']));
$isDt_bol = (!empty($_POST['fecha']) and !empty($_POST['codPlanilla']) and !empty($_POST['idp']));
$isDt_mnt = (!empty($_POST['monto']) and !empty($_POST['n']));
$isDt_cod = (!empty($_POST['tag']) and !empty($_POST['tipo']));

if($isDt_per){
    $dni = $_POST['dni'];
    $codMod = $_POST['codMod'];
    $apPaterno = strtoupper($_POST['apPaterno']);
    $apMaterno = strtoupper($_POST['apMaterno']);
    $nombres = strtoupper($_POST['nombres']);
    $condicion = strtoupper($_POST['condicion']);

    if($_POST['idp']==''){
        $query_insert = "INSERT INTO persona (dni, codMod, apPaterno, apMaterno, nombres, condicion) VALUE ('$dni', '$codMod', '$apPaterno', '$apMaterno', '$nombres', '$condicion'); ";
        $db->query($query_insert);
        //$query_select = "SELECT * FROM persona WHERE dni='$dni' AND codMod='$codMod' AND apPaterno='$apPaterno' AND apMaterno='$apMaterno' AND nombres='$nombres' AND condicion='$condicion'; ";
        //$db->query($query_select);
    }
    else if(!empty($_POST['idp'])){
        $idp = $_POST['idp'];
        $query_update = "UPDATE persona SET dni='$dni', codMod='$codMod', apPaterno='$apPaterno', apMaterno='$apMaterno', nombres='$nombres', condicion='$condicion' WHERE id_p='$idp'";
        $db->query($query_update);
    }
    
}
else if($isDt_bol){
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $codPlanilla = $_POST['codPlanilla'];
    $idp = $_POST['idp'];

    // add new boleta
    if(empty($_POST['n'])){
        $query_insert = "INSERT INTO boleta (fecha, lugar, codPlanilla, anulado, doc, id_p) VALUE ('$fecha', '$lugar','$codPlanilla', 'FALSE', '-', '$idp')";
        $db->query($query_insert);

        $query_select = "SELECT * FROM boleta WHERE fecha='$fecha' AND lugar='$lugar' AND codPlanilla='$codPlanilla' AND id_p='$idp';";
        $result = $db->query($query_select);

        $bol = array();
        while($row = $result->fetch_array()){
            $bol = array(
                'n' => $row['n']
            );
        }
        echo json_encode($bol);
    }
    else{
        if($_POST['accion'] == 'del'){
            $n = $_POST['n'];
            $query_delete = "DELETE FROM boleta WHERE n='$n'";
            $db->query($query_delete);
            echo json_encode(array('n'=>$query_delete));
        }
        else if($_POST['accion'] == 'update'){
            $n = $_POST['n'];
            $query_update = "UPDATE boleta SET fecha='$fecha', codPlanilla='$codPlanilla', lugar='$lugar' WHERE n='$n'";
            $db->query($query_update);
            echo json_encode(array('n'=>$n));
        }
    }
}
else if($isDt_mnt){
    if($_POST['accion']=='add'){
        $tipo = $_POST['tipo']=='ingreso'?1:-1;
        $tag = $_POST['tag'];
        $monto = floatval($_POST['monto']);
        $n = $_POST['n'];

        $query_insert = "INSERT INTO monto (tipo, tag, monto, n) VALUE ('$tipo', '$tag', '$monto', '$n')";
        $db->query($query_insert);

        $query_select = "SELECT * FROM monto WHERE tipo='$tipo' AND tag='$tag' AND monto LIKE '$monto' AND n='$n'";
        $result = $db->query($query_select);

        $monto = array('mensaje'=>'OK');
        while($row = $result->fetch_array()){
            $monto['idm'] = $row['id_m'];
            $monto['tipo'] = $row['tipo'];
            $monto['tag'] = $row['tag'];
            $monto['monto'] = $row['monto'];
        }

        echo json_encode($monto);

    }
    else if($_POST['accion']=='del'){
        $idm = $_POST['idm'];
        $query_del = "DELETE FROM monto WHERE id_m='$idm'";
        $db->query($query_del);
        echo "OK";
    }
    else if($_POST['accion'] == 'update'){
        $idm = $_POST['idm'];
        $cod = $_POST['cod'];
        $tag = $_POST['tag'];
        $monto = $_POST['monto'];

        $query_update = "UPDATE monto SET cod='$cod', tag='$tag', monto='$monto' WHERE id_m='$idm'";
        $db->query($query_update);
        echo $query_update;
        
    }    
}
else if($isDt_cod){
    $tag = $_POST['tag'];
    $tipo = $_POST['tipo']=='ingreso'? 1 : -1;

    $message = 'ERROR';
    if($_POST['accion'] == 'add'){
        $q = "INSERT INTO codigo (tipo, tag) VALUE ('$tipo', '$tag')";
        $result = $db->query($q);
        if($result){
            $message =  'OK';
        }
        else{
            $message = 'ERROR REP';
        }
    }
    else if($_POST['accion'] == 'del'){
        $idc = $_POST['idc'];
        $db->query("DELETE FROM codigo WHERE id_c='$idc'");
        $message = 'OK DEL';
    }
    echo $message;
}
else{
    echo "ERROR";
}
?>