<?php
include('back/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- DATA TABLE FUNCTIONS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    
    <!-- Java Script -->        
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        if ( window.history.replaceState ) 
        {
        window.history.replaceState( null, null, window.location.href );
        }
        $(document).ready(function()
        {
            $('#datatablesSimple').DataTable(
                {
                "language": {"url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"},
                "scrollX": true
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
    <br>
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

    <br>

    <div class='container'><table id='datatablesSimple' class='table table-bordered table-striped table-hover small border-bottom'>
        <thead>
            <tr>
                <th scope="col" class ='text-center' style ='width: 5%;'>N</th>
                <th scope="col" class ='text-center' style ='width: 10%;'>Cod Modular</th>
                <th scope="col" class ='text-center' style ='width: 20%;'>Nombres</th>
                <th scope="col" class ='text-center' style ='width: 20%;'>Fecha</th>
                <th scope="col" class ='text-center' style ='width: 10%;'>Planilla</th>
                <th scope="col" class ='text-center' style ='width: 10%;'>Condicion</th>
                <th scope="col" class ='text-center' style ='width: 5%;'>Acción</th>
            </tr>
        </thead>
        <tbody> 
            <?php foreach($personas as $per): ?>
                <tr>
                    <td class ='text-center'><?= $per['n'] ?></td>
                    <td class ='text-center'><?= $per['codMod'] ?></td>
                    <td class ='text-center'><?= $per['nombres'] ?></td>
                    <td class ='text-center'><?= $per['fecha'] ?></td>
                    <td class ='text-center'><?= $per['codPlanilla'] ?></td>
                    <td class ='text-center'><?= $per['condicion'] ?></td>
                    <td class ='text-center'style ='width: 50;'>
                        <form action='back/index4.php' method='post'>
                            <input hidden type="text" value = '<?= implode_keys('; ', $per) ?>' name='array'>
                            <button style='border:none;' type='submit'><a class="btn btn-outline-success bi bi-eye btn-sm"></a></button>
                        </form>                        
                        <!-- <a target="_blank" class="btn btn-outline-primary bi bi-box-arrow-down btn-sm" href="#" download></a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>        
    </table></div>

</body>
</html>