<?php
include('conexion.php');

$persona = explode_keys('; ', $_POST['arreglo']);

echo "<pre>";
print_r($persona);
echo "</pre>";

$boletas = array();

if(!empty($persona)){
    $id = $persona['id'];
    $query = "SELECT * FROM boleta WHERE id_p=$id";
    echo $query.'<br>';
    $result = $db -> query($query);
    
    while($row = $result->fetch_array()){
        $bol = array(
            'n' => $row['n'],
            'fecha' => $row['fecha'],
            'codPlanilla' => $row['codPlanilla'],
            'anulado' => $row['anulado'],
            'doc' => $row['doc'],
            'id_p' => $row['id_p']
        );

        array_push($boletas, $bol);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<hr>
    <?php foreach($boletas as $bol): ?>
        <div>
            <pre>
                <?php $per_bol = array_merge($persona, $bol); print_r($bol); ?>
            </pre>
            <form action='index4.php' method='post'>
                <input hidden type="text" value = '<?= implode_keys('; ', $per_bol) ?>' name='ar'>
                <button type='submit'>enviar</button>
            </form>
        </div>
    <?php endforeach; ?>
    
</body>
</html>