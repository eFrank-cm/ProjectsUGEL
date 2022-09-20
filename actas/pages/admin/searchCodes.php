<?php include('../../back/conexion.php'); ?>
<?php
$result = $db->query("SELECT * FROM codigo ORDER BY cod");

$codigos_pos = array();
$codigos_neg = array();
while($row = $result->fetch_array()){
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
$codigos_neg = array_reverse($codigos_neg);
?>
<div class="row justify-content-around">
    <div class='col-5'>
        <!-- TABLA COD INGRESOS -->
        <br>
        <h5>INGRESOS</h5>
        <table class='codtable table table-sm' id='codtable-pos'>
            <thead>
                <th hidden>IDC</th>
                <th>CODIGO</th>
                <th>ETIQUETA</th>
                <th>ACCION</th>
            </thead>
            <tbody>
                <?php foreach($codigos_pos as $cod): ?>
                    <tr>
                        <td hidden><?= $cod['idc'] ?></td>
                        <td><?= $cod['cod'] ?></td>
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
                <th hidden>IDC</th>
                <th>CODIGO</th>
                <th>ETIQUETA</th>
                <th>ACCION</th>
            </thead>
            <tbody>
                <?php foreach($codigos_neg as $cod): ?>
                    <tr>
                        <td hidden><?= $cod['idc'] ?></td>
                        <td><?= $cod['cod'] ?></td>
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
<script>
$(document).ready(function(){
    $('.codtable').DataTable({
        language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
        order: [],
        iDisplayLength: 15,
        searching: false,
        info: false,
        dom: '<"toolbar">frtip'
    });

    $('div.toolbar').html('');

})
</script>