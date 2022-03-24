<?php 
$ies = array();
$kw = "";
if (isset($_POST) and !empty($_POST)){
    $keyword = $kw = $_POST['keyword'];
    $query = "SELECT * FROM cursos WHERE ie LIKE '%$keyword%'";
    $result = $db->query($query);

    $c = 0;
    while($row = $result->fetch_array()){
        $docente = array(
            'dni' => $row['dni'],
            'nombre' => $row['nombres']." ".$row['ap_paterno']." ".$row['ap_materno'],
            'correo' => $row['correo'],
            'telefono' => $row['telefono'],
            'cargo' => $row['cargo'],
            'tipo_ie' => $row['tipo_ie']
        );

        if(!array_key_exists($row['ie'], $ies)){
            $ies[$row['ie']] = array();
        }

        if(!array_key_exists($row['nivel'], $ies[$row['ie']])){
            $ies[$row['ie']][$row['nivel']] = array();
        }

        switch ($row['cargo']){
            case 'DIRECTOR':
                $ies[$row['ie']][$row['nivel']]['a-'.$c] = $docente; break;
            case 'PROF (FUNCION DE DIR)':
                $ies[$row['ie']][$row['nivel']]['b-'.$c] = $docente; break;
            case 'SUBDIRECTOR':
                $ies[$row['ie']][$row['nivel']]['c-'.$c] = $docente; break;
            default:
                $ies[$row['ie']][$row['nivel']]['d-'.$c] = $docente; break;
        }
        ksort($ies[$row['ie']][$row['nivel']]);
        $c++;
    }
}
else{
    echo 'no hay nada';
}
?>