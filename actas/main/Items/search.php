<?php include('../back/conexion.php'); ?>
<?php
$cols_name = array();
$query = '';
if(array_key_exists('kw', $_POST)){
    $codMod = $_POST['kw'];
    $query = "SELECT * FROM persona WHERE codMod LIKE '%$codMod%'";
    array_push($cols_name, 'idp', 'codmod', 'nombres', 'condicion', 'accion');
}
if(array_key_exists('idp', $_POST)){
    $id_p = $_POST['idp'];
    $query = "SELECT * FROM boleta WHERE id_p LIKE '$id_p'";
    array_push($cols_name, 'N', 'FECHA', 'COD PLANILLA', 'ANULADO', 'IDP', 'ACCION');
}

$codigos = array();
if(array_key_exists('n', $_POST)){
    $n = $_POST['n'];
    $query = "SELECT * FROM monto WHERE n LIKE '$n'";
    array_push($cols_name, 'cod', 'monto', 'accion');

    $codigos = $db->query("SELECT cod, nombre FROM codigo");
}

$result = $db->query($query);

?>

<?php if(mysqli_num_rows($result)==0 and !array_key_exists('n', $_POST)): ?>
    <h4>No se encontro resultados para los criterios de busqueda</h4>
<?php elseif(array_key_exists('n', $_POST)):?>

    <form class='col container p-1'>
        <div class='card'>
            <h4 class='card-header'>Boleta</h4>
            <div class="shw-data-per">
                <div class="col p-2">
                    <div class="row align-items-start">
                        <!-- <div class="col-auto"> -->
                            <div class="col-1">
                                <label>Id: </label><input class='form-control form-control-sm' id='bol-idp-shw' type="text" readonly>
                            </div>
                            <div class="col-2">
                                <label>Codigo Modular: </label><input class='form-control form-control-sm' id='bol-codMod-shw' type="text" readonly>
                            </div>
                            <div class="col-6">
                                <label>Apellidos y Nombres: </label><input class='form-control form-control-sm' id='bol-nombres-shw' type="text" style="width:100%;" readonly>
                            </div>
                            <div class="col-1">
                                <label>Condicion: </label><input class='form-control form-control-sm' id='bol-condicion-shw' type="text" readonly>
                            </div>
                        <!-- </div> -->
                    </div>    
                </div>
            </div>

            <div class="div-bol">
                <form id='frm-data-bol' method='POST'>
                    <div class="col p-2"> 
                        <div class="row align-items-start">
                            <div class="col-1">
                                <label>Nro: </label><input class='form-control form-control-sm' name='n' id='n-data-bol' type="text" value='<?= $_POST['n']?>' readonly>
                            </div>
                            <div class="col-4">
                                <label>Fecha: </label><input class='form-control form-control-sm' name='fecha' id='fecha-data-bol' value='<?= $_POST['fecha']?>' type="text">
                            </div>
                            <div class="col-3">
                                <label>Planilla: </label><input class='form-control form-control-sm' name='codPlanilla' id='codPlanilla-data-bol' value='<?= $_POST['codPlanilla']?>' type="text">
                            </div>
                            <div class='col-3 align-self-end'>
                                <!-- <label>Anulado: </label><input name="anulado" id='anulado-data-bol' type="checkbox"> -->
                                <button class='btn btn-success btn-sm' id='save-bol' style='position: static;'><i class="bi bi-check2"></i> Guardar</button>
                                <button class='btn btn-danger btn-sm' id='delbtn-bol' style='position: static;' disabled><i class="bi bi-trash"></i> Eliminar</button>
                            </div>
                            <!-- GUARDAR ID -->
                            <div class="col-auto">
                                <input class='form-control form-control-sm' name='idp' id='idp-data-bol' type="text" readonly hidden>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $('#tb-montos').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "iDisplayLength": 10,
                "ordering": false,
                lengthMenu: [
                    [10, 25, 36],
                    [10, 25, 36],
                ]
            });
        });
    </script>
    <form class='col container p-1'>
        <div class='card'>
            <h4 class='card-header'>Montos de la boleta</h4>
        
            <div class='p-2'>
                <table class="display m-1" id='tb-montos'>
                    <thead>
                        <tr>
                            <th>idm</th>
                            <th>Codigo</th>
                            <th>Monto</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_array()){ ?>
                            <tr>
                                <td><?= $row['id_m'] ?></td>
                                <td contenteditable>
                                    <?= $row['cod'] ?>

                                </td>
                                <td contenteditable><?= $row['monto'] ?></td>
                                <td>
                                    <button class='update-monto btn btn-outline-success btn-sm'><i class="bi bi-pencil-square"></i> Editar</button>
                                    <button class='del-monto btn btn-outline-danger btn-sm' type='button'><i class="bi bi-trash3"></i> Eliminar</button>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td class='td-monto' id='add-cod-monto' contenteditable>
                                <select name="cod" id="cod-add-monto">
                                    <option value=""></option>
                                    <?php while($cod = $codigos->fetch_array()) {?>
                                        <option value='<?= $cod['cod'] ?>'><?= $cod['cod']?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class='td-monto' contenteditable></td>
                            <td><button class='add-monto btn btn-outline-primary btn-sm' disabled><i class="bi bi-plus-circle"></i> Agregar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>    
    </form>  
<?php else:?>
    <br>
    <table>
        <thead>
            <tr>
                <?php foreach($cols_name as $col): ?>
                    <th scope="col"><?= $col ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_array()){ ?>
                <?php if(array_key_exists('kw', $_POST)): ?>
                    <tr>
                        <td><?= $row['id_p'] ?></td>
                        <td><?= $row['codMod'] ?></td>
                        <td><?= $row['nombres'] ?></td>
                        <td><?= $row['condicion'] ?></td>
                        <td><button class="select" name='selectbtn' type='button'>Elegir</button></td>
                    </tr>
                <?php elseif(array_key_exists('idp', $_POST)):?>
                    <tr>
                        <td><?= $row['n'] ?></td>
                        <td><?= $row['fecha'] ?></td>
                        <td><?= $row['codPlanilla']?></td>
                        <td><?= $row['anulado']?></td>
                        <td><?= $row['id_p']?></td>
                        <td>
                            <button class="editbtn" name='editbtn-bol' type='button'>Elegir</button>
                            <button class="" name='' type='button'>Ver</button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php } ?>
        </tbody>
    </table>
<?php endif; ?>