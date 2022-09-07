<?php include('../back/conexion.php'); ?>
<?php

$isDt_per = (!empty($_POST['codMod']) and !empty($_POST['apPaterno']) and !empty($_POST['apMaterno']) and !empty($_POST['nombres']) and !empty($_POST['condicion']));
$isDt_bol = (!empty($_POST['fecha']) and !empty($_POST['codPlanilla']) and !empty($_POST['idp']));
$isDt_mnt = (!empty($_POST['cod']) and !empty($_POST['monto']) and !empty($_POST['n']));
$isDt_cod = (!empty($_POST['cod']) and !empty($_POST['tag']));

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
else if($isDt_cod){
    $idc = $_POST['idc'];
    $cod = $_POST['cod'];
    $tag = $_POST['tag'];
    
    if($_POST['accion'] == 'add'){
        $db->query("INSERT INTO codigo (cod, tag) VALUE ('$cod', '$tag')");
    }
    else if($_POST['accion'] == 'del'){
        $db->query("DELETE FROM codigo WHERE id_c='$idc'");
    }
    echo 'OK';
}
else{
    echo "ERROR";
}
?>