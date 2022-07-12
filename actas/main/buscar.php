<?php
$db = new mysqli('localhost', 'root', '', 'bd_conta');

$codMod = $_POST['codMod'];
$nombre = $_POST['nombre'];
$condicion = $_POST['condicion'];

$query = "SELECT * FROM persona WHERE codMod LIKE '$codMod'";

$result = $db->query($query);

$search_results = array(); 
while($row = $result->fetch_array()){
    $item = array(
        'codMod' => $row['codMod'],
        'nombre' => $row['nombre'],
        'condicion' => $row['condicion']
    );
    array_push($search_results, $item);
}

echo mysqli_num_rows($result);

// $query = "INSERT INTO persona ( codMod, nombres, condicion)
//             VALUES ( '$codMod', '$nombre', '$condicion')";

// echo mysqli_query($conexion, $query);

?>