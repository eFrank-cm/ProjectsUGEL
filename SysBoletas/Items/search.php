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
    $query = "SELECT * FROM boleta WHERE id_p LIKE '$id_p' ORDER BY n DESC";
    array_push($cols_name, 'Nro', 'FECHA', 'LUGAR', 'COD PLANILLA', 'IDP', 'ACCION');
}

$codigos = array();
if(array_key_exists('n', $_POST)){
    $n = $_POST['n'];
    $query = "SELECT * FROM monto WHERE n LIKE '$n' ORDER BY id_m DESC";
    array_push($cols_name, 'CODIGO', 'MONTO', 'ACCION');

    $codigos = $db->query("SELECT * FROM codigo");
}

if(array_key_exists('cod', $_POST)){
    $cod = $_POST['cod'];
    $res = $db->query("SELECT tag FROM codigo WHERE cod='$cod'");

    $tags = array();
    while($row = $res->fetch_array()){
        array_push($tags, $row['tag']);
    }
    echo json_encode($tags);
    die();
}

$result = $db->query($query);

?>

<?php if(mysqli_num_rows($result)==0 and !array_key_exists('n', $_POST)): ?>
    <h4>No se encontro resultados para los criterios de busqueda</h4>
<?php elseif(array_key_exists('n', $_POST)):?>
    <div class='col container p-1'>
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
                            <div class="col-2">
                                <label>Condicion: </label><input class='form-control form-control-sm' id='bol-condicion-shw' type="text" readonly>
                            </div>
                        <!-- </div> -->
                    </div>    
                </div>
            </div>

            <div class="div-bol">
                <!-- FORMULARIO - DATOS BOLETA -->
                <form id='frm-data-bol' method='POST'>
                    <div class="col p-2"> 
                        <div class="row align-items-start">
                            <div class="col-1">
                                <label>Nro: </label><input class='form-control form-control-sm' name='n' id='n-data-bol' type="text" value='<?= $_POST['n']?>' readonly>
                            </div>
                            <div class="col-3">
                                <label>Fecha: </label><input class='form-control form-control-sm' name='fecha' id='fecha-data-bol' value='<?= $_POST['fecha']?>' type="text" style="text-transform:uppercase;">
                            </div>
                            <div class="col-3">
                                <label>Lugar: </label><input class='form-control form-control-sm' name='lugar' id='lugar-data-bol' value='<?= $_POST['lugar']?>' type="text" style="text-transform:uppercase;">
                            </div>
                            <div class="col-2">
                                <label>Planilla: </label><input class='form-control form-control-sm' name='codPlanilla' id='codPlanilla-data-bol' value='<?= $_POST['codPlanilla']?>' type="text">
                            </div>
                            <div class='col-3 align-self-end'>
                                <!-- <label>Anulado: </label><input name="anulado" id='anulado-data-bol' type="checkbox"> -->
                                <button class='btn btn-success btn-sm' id='save-bol' style='position: static;'><i class="bi bi-check2"></i> Guardar</button>
                                <button class='btn btn-danger btn-sm' id='delbtn-bol' style='position: static;' disabled><i class="bi bi-trash"></i> Eliminar Boleta</button>
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
    </div>

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
                ],
                "columnDefs": [
                    {
                        "targets": 1,
                        "visible": true
                    }
                ]
            });
        });
    </script>
    <form class='col container p-1' id='frm-monto' hidden>
        <div class='card'>
            <h4 class='card-header'>Montos</h4>
        
            <div class='container p-4'>
                <table class="display m-1 w-100" id='tb-montos'>
                    <thead>
                        <tr>
                            <th hidden>IDM</th>
                            <th></th>
                            <th class='text-center'>ETIQUETA</th>
                            <th class='text-center'>MONTO (S/.)</th>
                            <th class='text-center'>ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td hidden></td>
                            <!-- <td class='td-monto onlynumber' id='add-cod-monto' contenteditable> -->
                            <td><h6></h6></td>
                            <td class='text-center'>
                                <!-- <select class='form-select form-select-sm cmb-monto' id='cmb-tag'> -->
                                <input class="form-control cmb-monto" list="cmb-tag2" id="cmb-tag" placeholder="Busque el codigo">
                                <datalist id="cmb-tag2">
                                    <!-- <option value=""></option> -->
                                    <?php while($row = $codigos->fetch_array()){?>
                                        <?php $tp = $row['tipo']>0?"+":"-"; ?>
                                        <option data-value='<?= $tp.' '. $row['tag'] ?>'><?= $row['tag']." (".$tp.")"?></option>
                                    <?php };?>
                                </datalist>
                                <!-- </select> -->
                            </td>
                            <td class='text-center'><input id='inptmonto' class='form-control form-control-sm text-end td-monto onlynumber' maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></td>
                            <td class='text-center'><button class='add-monto btn btn-outline-primary btn-sm' disabled><i class="bi bi-plus-circle"></i> Agregar</button></td>
                        </tr>
                        <?php while($row = $result->fetch_array()){ ?>
                            <tr>
                                <td hidden><?= $row['id_m'] ?></td>
                                <td class='text-end'><h4>
                                    <?php if($row['tipo']>0): ?>
                                        <i class="bi bi-arrow-up-circle-fill text-success"></i>
                                    <?php else:?>
                                        <i class="bi bi-arrow-down-circle-fill text-danger"></i>
                                    <?php endif; ?>
                                </h4></td>
                                <td><?= $row['tag'] ?></td>
                                <td class='text-end onlynumber'><?= number_format($row['monto'], 2, '.', ' ') ?></td>
                                <td class='text-center'>
                                    <!-- <button class='update-monto btn btn-outline-success btn-sm'><i class="bi bi-pencil-square"></i> Editar</button> -->
                                    <button class='del-monto btn btn-outline-danger btn-sm'><i class="bi bi-trash3"></i> Eliminar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </form>  
<?php else:?>
    <br>
    <script>
        $(document).ready(function () {
            $('#tabla2Boletas').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                "iDisplayLength": 10,
                "ordering": false,
                lengthMenu: [
                    [10, 25, 35, -1],
                    [10, 25, 35, 'Todos'],
                ]
            });
        });
    </script>
    <table class='table table-sm' id='tabla2Boletas'>
        <thead>
            <tr>
                <?php foreach($cols_name as $col): ?>
                    <?php if($col=='IDP'): ?>
                        <th scope="col" hidden><?= $col ?></th>
                    <?php else:?>
                        <th scope="col"><?= $col ?></th>
                    <?php endif; ?>
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
                        <td><?= $row['fecha']=='nan'?'': $row['fecha'] ?></td>
                        <td><?= $row['lugar']=='nan'?'': $row['lugar']?></td>
                        <td><?= $row['codPlanilla']?></td>
                        <td hidden><?= $row['id_p']?></td>
                        <td>
                            <button class="btn btn-outline-success btn-sm editbtn" name='editbtn-bol' type='button'><i class="bi bi-pencil"></i></button>
                            <button class="btn btn-outline-primary btn-sm verbtn-bol" name='' type='button'><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php } ?>
        </tbody>
    </table>
<?php endif; ?>