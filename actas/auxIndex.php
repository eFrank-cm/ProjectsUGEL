<?php
include('back/conexion.php');
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
    <div class="container border p-3">
        <h3>REGISTRO DE PERSONAS</h3>
        <hr>
        <form class='row m-0' method='post'>
            <input required name="keyword" type="text" class="col-4 form-control w-25">
            <div class='col-4 pr-1'>
                <button type="submit" class="col-4 btn btn-secondary text-center pr-1 pl-1">Buscar</button>
            </div> 
        </form>
    </div>

    <?php include('back/get_persona.php'); ?>

    <hr>
    <?php foreach($personas as $per): ?>
        <div>
            <pre>
                <?php print_r($per); ?>
            </pre>
            <form action='back/get_boletas.php' method='post'>
                <input hidden type="text" value = '<?= implode_keys('; ', $per) ?>' name='arreglo'>
                <button type='submit'>enviar</button>
            </form>
        </div>
    <?php endforeach; ?>

</body>
</html>