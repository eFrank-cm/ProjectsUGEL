<?php include('../back/conexion.php'); ?>
<?php

$isDt_per = (!empty($_POST['codMod']) and !empty($_POST['nombres']) and !empty($_POST['condicion']));
$isDt_bol = (!empty($_POST['fecha']) and !empty($_POST['codPlanilla']) and !empty($_POST['idp']));
$isDt_mnt = (!empty($_POST['cod']) and !empty($_POST['monto']) and !empty($_POST['n']));

if($isDt_per){
    $codMod = $_POST['codMod'];
    $nombres = strtoupper($_POST['nombres']);
    $condicion = strtoupper($_POST['condicion']);

    $query_insert = "INSERT INTO persona (codMod, nombres, condicion) VALUE ('$codMod', '$nombres', '$condicion'); ";
    $db->query($query_insert);

    $query_select = "SELECT * FROM persona WHERE codMod='$codMod' AND nombres='$nombres' AND condicion='$condicion'; ";
    $result = $db->query($query_select);

    $per = array();
    while($row = $result->fetch_array()){
        $per = array(
            'idp'=> $row['id_p'],
            'codMod' => $row['codMod'],
            'nombres' => $row['nombres'],
            'condicion'=> $row['condicion'],
            'mensaje' => 'se agrego una persona' 
        );
    }
    echo json_encode($per);
}
else if($isDt_bol){
    $fecha = $_POST['fecha'];
    $codPlanilla = $_POST['codPlanilla'];
    $idp = $_POST['idp'];

    // add new boleta
    if(empty($_POST['n'])){
        $query_insert = "INSERT INTO boleta (fecha, codPlanilla, anulado, doc, id_p) VALUE ('$fecha', '$codPlanilla', 'FALSE', '-', '$idp')";
        $db->query($query_insert);

        $query_select = "SELECT * FROM boleta WHERE fecha='$fecha' AND codPlanilla='$codPlanilla' AND id_p='$idp';";
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
            $fecha = $_POST['fecha'];
            $codPlanilla = $_POST['codPlanilla'];
            $query_delete = "DELETE FROM boleta WHERE n='$n'";
            $db->query($query_delete);
            echo json_encode(array('n'=>$query_delete));
        }
        else if($_POST['accion'] == 'update'){
            $n = $_POST['n'];
            $fecha = $_POST['fecha'];
            $codPlanilla = $_POST['codPlanilla'];
            $query_update = "UPDATE boleta SET fecha='$fecha', codPlanilla='$codPlanilla' WHERE n='$n'";
            $db->query($query_update);
            echo json_encode(array('n'=>$n));
        }
    }
}
else if($isDt_mnt){
    if($_POST['accion']=='add'){
        $cod = $_POST['cod'];
        $tag = $_POST['tag'];
        $monto = $_POST['monto'];
        $n = $_POST['n'];

        $query_insert = "INSERT INTO monto (cod, tag, monto, n) VALUE ('$cod', '$tag', '$monto', '$n')";
        $db->query($query_insert);

        $query_select = "SELECT * FROM monto WHERE cod='$cod' AND tag='$tag' AND monto='$monto' AND n='$n'";
        $result = $db->query($query_select);

        $monto = array('mensaje'=>$query_insert);
        while($row = $result->fetch_array()){
            $monto['idm'] = $row['id_m'];
            $monto['cod'] = $row['cod'];
            $monto['tag'] = $row['tag'];
            $monto['monto'] = $row['monto'];
        }

        echo json_encode($monto);

    }
    else if($_POST['accion']=='del'){
        $idm = $_POST['idm'];
        $cod = $_POST['cod'];
        $tag = $_POST['tag'];
        $monto = $_POST['monto'];

        $query_del = "DELETE FROM monto WHERE cod='$cod' AND tag='$tag' AND monto='$monto' AND id_m='$idm'";

        $db->query($query_del);

        echo "Se elimino {$_POST['cod']} y {$_POST['monto']}";
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

else{
    echo "ERROR";
}
?>