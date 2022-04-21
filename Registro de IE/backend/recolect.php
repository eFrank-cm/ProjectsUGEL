<?php 
$ies = array();
$kw = "";
if (isset($_POST) and array_key_exists('keyword', $_POST)){
    $keyword = $kw = $_POST['keyword'];
    $query = "SELECT * FROM ie WHERE nombreIE LIKE '%$keyword%'";
    $result = $db->query($query);

    $c = 0;
    while($row = $result->fetch_array()){
        $ie = array(
            'codModIE' => $row['codModIE'],
            'tipoIE' => $row['tipoIE'],
            'ubicacion' => $row['provincia']."-".$row['distrito']."-".$row['zona'],
            'nivel' => $row['nivelEducativo'],
            'nombreIE' => $row['nombreIE']
        );

        array_push($ies, $ie);        

        // var_dump($ie);

        // if(!array_key_exists($row['ie'], $ies)){
        //     $ies[$row['ie']] = array();
        // }

        // if(!array_key_exists($row['nivel'], $ies[$row['ie']])){
        //     $ies[$row['ie']][$row['nivel']] = array();
        // }

        // switch ($row['cargo']){
        //     case 'DIRECTOR':
        //         $ies[$row['ie']][$row['nivel']]['a-'.$c] = $docente; break;
        //     case 'PROF (FUNCION DE DIR)':
        //         $ies[$row['ie']][$row['nivel']]['b-'.$c] = $docente; break;
        //     case 'SUBDIRECTOR':
        //         $ies[$row['ie']][$row['nivel']]['c-'.$c] = $docente; break;
        //     default:
        //         $ies[$row['ie']][$row['nivel']]['d-'.$c] = $docente; break;
        // }
        // ksort($ies[$row['ie']][$row['nivel']]);
        // $c++;
    }
}
else{
    echo "";
}

//  var_dump($ies);

?>

