<?php 
$personas = array();
#$kw = "";

if(isset($_POST['keyword']))
{
    $keyword = $_POST['keyword'];
    // $keyword = $kw = $_POST['keyword'];
    // $query = "SELECT * FROM persona WHERE nombres LIKE '%$keyword%' OR codMod LIKE '%$keyword%'";
    $query = "SELECT * FROM persona INNER JOIN boleta ON persona.id_p = boleta.id_p WHERE nombres LIKE '%$keyword%' or codMod LIKE '%$keyword%'";
    $result = $db->query($query);

    //var_dump($result);
    while($row = $result->fetch_array()){
        $per = array(
            // 'id' => $row['id_p'],
            'codMod' => $row['codMod'],
            'nombres' => $row['nombres'],
            'condicion' => $row['condicion'],
            'n'=> $row['n'],
            'fecha' => $row['fecha'],
            'codPlanilla' => $row['codPlanilla'],
            'anulado' => $row['anulado'],
            // 'doc' => $row['doc']
            // 'id_p' => $row['id_p']
        );
        array_push($personas, $per);
    }

    if(!empty($personas))
    {
        $mensaje[] = 'EXITO: Se encontraron resultados!';
    }
    else
    {
        $error[] = 'ERROR: No se encontraron resultados!';
    }

}

// $personas = array();
// if(isset($_POST) and array_key_exists('add', $_POST)){
//     $result =  $db->query("SELECT * FROM persona");

//     while($row = $result -> fetch_array()){
//         $per = array(
//             'id_p' => $row['id_p'],
//             'codMod' => $row['codMod'],
//             'nombres' => $row['nombres'],
//             'condicion' => $row['condicion']
//         );
//         array_push($personas, $per);
//     }

//     echo "<pre>";
//     print_r($personas);
//     echo "</pre>";
// }

// out: $personas
// out: $personas
?>