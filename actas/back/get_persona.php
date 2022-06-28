<?php 
$personas = array();
$kw = "";
if(isset($_POST) and array_key_exists('keyword', $_POST)){
    $keyword = $kw = $_POST['keyword'];
    echo $keyword."<br>";
    $query = "SELECT * FROM persona WHERE nombres LIKE '%$keyword%' OR codMod LIKE '%$keyword%'";
    echo $query."<br>";
    $result = $db->query($query);

    //var_dump($result);
    while($row = $result->fetch_array()){
        $per = array(
            'id' => $row['id_p'],
            'codMod' => $row['codMod'],
            'nombres' => $row['nombres'],
            'condicion' => $row['condicion']
        );
        array_push($personas, $per);
    }
}

// out: $personas
?>