<?php

$planilla = array(
    'DIRECTOR' => array(),
    'COORDINADOR' => array(),
    'ESPECIALISTA' => array(),
    'FORMADOR' => array(),
    'PROF' => array(),
    'JEFE' => array(),
    'AUXILIAR' => array(),
    'PER_ADM' => array(),
    'VACANTES' => array()
);

$personal = array();

$ie = array();
if (isset($_POST) and array_key_exists('codModIE', $_POST)){
    $ie['codModIE'] = $_POST['codModIE'];
    $ie['tipoIE'] = $_POST['tipoIE'];
    $ie['ubicacion'] = $_POST['ubicacion'];
    $ie['nivel'] = $_POST['nivel'];
    $ie['nombreIE'] = $_POST['nombreIE'];
    $query = "SELECT * FROM planilla2 WHERE codModIE='{$ie['codModIE']}'";
    $result = $db->query($query);

    $c = 0;
    while($row = $result->fetch_array()){
        $email = $row['email']=='0'? '':$row['email'];
        $nroCel = $row['nroCelular']=='0'? '':$row['nroCelular'];
        $plaza = array(
            'codPlaza' => $row['codPlaza'],
            'tipo' => $row['tipoTrabajador'],
            'subtipo' => $row['subTipoTrabajador'],
            'cargo' => $row['cargo'],
            'estado' => $row['situacionLaboral'],
            'docIdentidad' => $row['docIdentidad'],
            'nombre' => "{$row['apPaterno']} {$row['apMaterno']} {$row['nombres']}",
            'nroCel' => $nroCel,
            'email' => $email
        );

        


        if($plaza['estado']=='VACANTE'){
            $plaza['tag']='VACANTES';
            //array_push($planilla['VACANTES'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'DIRECTOR')){
            $plaza['tag']='DIRECTOR';
            //array_push($planilla['DIRECTOR'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'COORDINADOR')){
            $plaza['tag']='COORDINADOR';
            //array_push($planilla['COORDINADOR'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'ESPECIALISTA')){
            $plaza['tag']='ESPECIALISTA';
            //array_push($planilla['ESPECIALISTA'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'FORMADOR')){
            $plaza['tag']='FORMADOR';
            //array_push($planilla['FORMADOR'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'PROFESOR')){
            $plaza['tag']='PROFESOR';
            //array_push($planilla['PROF'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'JEFE')){
            $plaza['tag']='JEFE';
            //array_push($planilla['JEFE'], $plaza);
        }
        else if (!strpos($plaza['cargo'], 'AUXILIAR')){
            $plaza['tag']='AUXILIAR';
            //array_push($planilla['AUXILIAR'], $plaza);
        }
        else{
            $plaza['tag']='PER_ADM';
            //array_push($planilla['PER_ADM'], $plaza);
        }
        array_push($personal, $plaza);
    }
}
else{
    echo "";
}
//krsort($planilla['DIRECTOR']);
//var_dump($personal);
?>