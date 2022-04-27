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
            'nivel' => $row['nivel'],
            'nombreIE' => $row['nombreIE']
        );

        array_push($ies, $ie);        
    }
}
else{
    echo "";
}

//  var_dump($ies);

?>

