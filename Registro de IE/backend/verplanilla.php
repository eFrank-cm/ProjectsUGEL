<?php 

$planilla = array(
    'DIRECTOR' => array(),
    'COORDINADOR' => array(),
    'ESPECIALISTA' => array(),
    'FORMADOR' => array(),
    'PROF_JEFE' => array(),
    'AUXILIAR' => array(),
    'PER_ADM' => array(),
    'VACANTES' => array()
);

if (isset($_POST) and array_key_exists('codModIE', $_POST)){
    $codModIE = $_POST['codModIE'];
    $query = "SELECT * FROM planilla2 WHERE codModIE='$codModIE'";
    $result = $db->query($query);

    $c = 0;
    while($row = $result->fetch_array()){
        $plaza = array(
            'codPlaza' => $row['codPlaza'],
            'tipo' => $row['tipoTrabajador']."-".$row['subTipoTrabajador'],
            'cargo' => $row['cargo'],
            'estado' => $row['situacionLaboral'],
            'docIdentidad' => $row['docIdentidad'],
            'nombre' => "{$row['apPaterno']} {$row['apMaterno']} {$row['nombres']}",
            'nroCel' => $row['nroCelular'],
            'email' => $row['email']
        );

        if (str_contains($plaza['cargo'], 'DIRECTOR')){
            array_push($planilla['DIRECTOR'], $plaza);
        }
        else if(str_contains($plaza['cargo'], 'COORDINADOR')){
            array_push($planilla['COORDINADOR'], $plaza);
        }
        else if(str_contains($plaza['cargo'], 'ESPECIALISTA')){
            array_push($planilla['ESPECIALISTA'], $plaza);
        }
        else if(str_contains($plaza['cargo'], 'FORMADOR')){
            array_push($planilla['FORMADOR'], $plaza);
        }
        else if(str_contains($plaza['cargo'], 'PROFESOR') or str_contains($plaza['cargo'], 'JEFE')){
            array_push($planilla['PROF_JEFE'], $plaza);
        }
        else if(str_contains($plaza['cargo'], 'AUXILIAR')){
            array_push($planilla['AUXILIAR'], $plaza);
        }
        // else if($plaza['docIdentidad'] == ''){
        //     array_push($planilla['VACANTE'], $plaza);
        // }
        else{
            array_push($planilla['PER_ADM'], $plaza);
        }
    }
}
else{
    echo "";
}
var_dump($planilla)
?>