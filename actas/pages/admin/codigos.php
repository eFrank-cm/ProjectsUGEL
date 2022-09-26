<?php include("../templates/head.php"); ?>
<br>
<div class='container row'>
    <div class="col-3">
        <h2 class='text-center'>CODIGO DE BOLETAS</h2>
    </div>
    <div class='d-flex justify-content-center col-7'>
        <form id='addfrm-cod' class='form-group' method='post'>
            <div class="row align-items-start">
                <div class="col-4"><label class="form-label fw-bolder">Etiqueta: </label></div>
                <div class="col-4"><label class="form-label fw-bolder">Tipo: </label></div>
            </div>
            <div class="row align-items-start">
            <div class="col-4"><input id='tag' class="text form-control form-control-sm" name='tag' type="text"></input></div>
                <div class="col-4">
                    <select id='tipo' class="form-select form-select-sm" name='tipo' type="text">
                        <option value=""></option>
                        <option value="ingreso">INGRESO</option>
                        <option value="egreso">EGRESO</option>
                    </select>
                </div>
                <div class="col-2"><button class='btn btn-sm btn-outline-success d-inline' id='addbtn-cod' type='submit'>Agregar</button></div>
                <div class="col-2" hidden><button class='btn btn-sm btn-outline-success d-inline' id='updbtn' type='submit'>Actualizar</button></div>
            </div>
        </form>
    </div>
</div>
<br>
<!-- TABLAS DE CODIGO -->
<div id='divtb-posneg' class="container border" >
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='codigos.js'></script>

<?php include("../templates/footer.php"); ?>


                    


