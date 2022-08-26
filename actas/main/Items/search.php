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
    <h4>Boleta</h4>
    <div class="shw-data-per">
        <label>Id: </label><input id='bol-idp-shw' type="text" readonly>
        <label>Codigo Modular: </label><input id='bol-codMod-shw' type="text" readonly>
        <label>Apellidos y Nombres: </label><input id='bol-nombres-shw' type="text" readonly>
        <label>Condicion: </label><input id='bol-condicion-shw' type="text" readonly>
    </div>
    <div class="div-bol">
        <form id='frm-data-bol' method='POST'>
            <label>Nro: </label><input name='n' id='n-data-bol' type="text" value='<?= $_POST['n']?>' readonly>
            <label>Fecha: </label><input name='fecha' id='fecha-data-bol' value='<?= $_POST['fecha']?>' type="text">
            <label>Planilla: </label><input name='codPlanilla' id='codPlanilla-data-bol' value='<?= $_POST['codPlanilla']?>' type="text">
            <input name='idp' id='idp-data-bol' type="text" readonly hidden>
            <!-- <label>Anulado: </label><input name="anulado" id='anulado-data-bol' type="checkbox"> -->
            <button id='save-bol'>guardar</button>
            <button id='delbtn-bol' disabled>Eliminar</button>
        </form>
    </div>
    <br>
    <table id='tb-montos'>
        <thead>
            <tr>
                <th>idm</th>
                <th>Codigo</th>
                <th>Monto</th>
                <th>Accion</th>
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
                        <button class='del-monto' type='button'>Eliminar</button>
                        <button class='update-monto'>editar</button>
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
                <td><button class='add-monto' disabled>Agregar</button></td>
            </tr>
        </tbody>
    </table>
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