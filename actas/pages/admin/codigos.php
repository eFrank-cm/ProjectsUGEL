<?php include("../templates/head.php"); ?>
<?php
$result_pos = $db->query("SELECT * FROM codigo ORDER BY cod");

$codigos_pos = array();
$codigos_neg = array();
while($row = $result_pos->fetch_array()){
    $cod = array(
        'idc' => $row['id_c'],
        'cod' => $row['cod'],
        'tag' => $row['tag']
    );

    if($row['cod']<=0){
        array_push($codigos_neg, $cod);
    }
    else{
        array_push($codigos_pos, $cod);
    }
}
// $codigos_neg = array_reverse($codigos_neg);
?>
<br>
<div class='container row'>
    <div class="col-3">
        <h2 class='text-center'>CODIGO DE BOLETAS</h2>
    </div>
    <div class='d-flex justify-content-center col-7'>
        <form id='addfrm-cod' class='form-group' method='post'>
            <div class="row align-items-start">
                <div class="col-4"><label class="form-label fw-bolder">Codigo: </label></div>
                <div class="col-4"><label class="form-label fw-bolder">Etiqueta: </label></div>
            </div>
            <div class="row align-items-start">
                <div class="col-4"><input id='cod' id='codMod-shw' class="text form-control form-control-sm onlynumber" name='cod' type="text"></div>
                <div class="col-4"><input id='tag' class="text form-control form-control-sm" name='tag' type="text"></input></div>
                <div class="col-2"><button class='btn btn-sm btn-outline-success d-inline' id='addbtn-cod' type='submit'>Agregar</button></div>
            </div>
        </form>
    </div>
</div>
<br>
<div class="container border">
    <div class="row justify-content-around">
        <div class='col-5'>
            <!-- TABLA COD INGRESOS -->
            <br>
            <h5>INGRESOS</h5>
            <table class='codtable table table-sm' id='codtable-pos'>
                <thead>
                    <th>CODIGO</th>
                    <th hidden>IDC</th>
                    <th>ETIQUETA</th>
                    <th>ACCION</th>
                </thead>
                <tbody>
                    <?php foreach($codigos_pos as $cod): ?>
                        <tr>
                            <td><?= $cod['cod'] ?></td>
                            <td hidden><?= $cod['idc'] ?></td>
                            <td><?= $cod['tag'] ?></td>
                            <td>
                                <button class='delbtn-cod btn btn-outline-danger btn-sm'><i class="bi bi-trash3"></i> Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class='col-5'>
            <!-- TABLA COD EGRESOS -->
            <br>
            <h5>EGRESOS</h5>
            <table class='codtable table table-sm' id='codtable-neg'>
                <thead>
                    <th>CODIGO</th>
                    <th hidden>IDC</th>
                    <th>ETIQUETA</th>
                    <th>ACCION</th>
                </thead>
                <tbody>
                    <?php foreach($codigos_neg as $cod): ?>
                        <tr>
                            <td><?= $cod['cod'] ?></td>
                            <td hidden><?= $cod['idc'] ?></td>
                            <td><?= $cod['tag'] ?></td>
                            <td>
                                <button class='delbtn-cod btn btn-outline-danger btn-sm'><i class="bi bi-trash3"></i> Eliminar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='codigos.js'></script>

<?php include("../templates/footer.php"); ?>


                    


