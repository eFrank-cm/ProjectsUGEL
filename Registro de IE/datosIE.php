<?php  
include('template/head.php'); 
include('backend/conexion.php');
include('backend/verplanilla.php');
?>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src='https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script scr='main3.js'></script>
<script>
$(document).ready(function() {
    $('#tabla').DataTable( {

        "language": {"url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"},

        //"paging": false,

        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],

        dom: 'Bfrtip',
        lengthMenu: [
            [ 20],
            ['20']
        ],

        buttons: [
            'pageLength'
        ],
        
        initComplete: function () {
            this.api().columns([0]).every( function () {
                var column = this;
                var select = $("<select class='form-select d-inline' id='combo' style='padding: 3px;'><option class='small p-1' value=''>(TODO)</option></select>")
                    .appendTo( $('#box') )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().each( function ( d, j ) {
                    tag = d;

                    switch (d) {
                        case 'PER_ADM':
                            tag = 'Personal y Administrativos'; break;
                        case 'DIRECTOR':
                            tag = 'Directivos'; break;
                        case 'PROFESOR':
                            tag = 'Docentes'; break;
                        case 'AUXILIAR':
                            tag = 'Auxiliares'; break;
                        case 'COORDINADOR':
                            tag = 'Coordinadores'; break;
                        case 'JEFE':
                            tag = 'Jefes'; break;
                        case 'ESPECIALISTA':
                            tag = 'Especialistas'; break;
                        case 'FORMADOR':
                            tag = 'Formadores'; break;
                        case 'VACANTES':
                            tag = 'Plazas Vacantes'; break;
                    }

                    select.append( '<option class="small p-1" value="'+d+'">'+tag.toUpperCase()+'</option>' )
                } );
            } );
        }
    } );

    $("#tabla1_filter").appendTo('<b>Custom tool bar! Text/images etc.</b>');
} );
</script>

<br>
<div class="container content">
    <?php
    echo "<div class='container w-75'>";
    echo    "<div class='border m-0 p-3'>";
    echo        "<h4 class='mb-0 text-center'>{$ie['nombreIE']}</h4><hr class='mt-1'>";
    echo        "<div class='container row'>";
    echo            "<div class='col-6 d-inline text-center'>";
    echo                "<img class='img-fluid' src='img\lgIE.png' style='width: 100px;'>";
    echo            "</div>";
    echo            "<div class='col-6'>";
    echo                "<h6 class='d-inline'>Nivel Educativo: </h6><label>{$ie['nivel']}</label><br>";
    echo                "<h6 class='d-inline'>Tipo de Institucion: </h6><label>{$ie['tipoIE']}</label><br>";
    echo                "<h6 class='d-inline'>Ubicacion: </h6><label>{$ie['ubicacion']}</label><br>";
    echo                "<h6 class='d-inline'>Codigo Modular: </h6><label>{$ie['codModIE']}</label><br>";
    echo            "</div>";
    echo        "</div>";
    echo    "</div>";
    echo "</div>";
    echo "<br>";
    ?>

    <div class='container border p-3 content'>
    
    <h4 class='mb-0 text-left'>Personal de la Institucion Educativa</h4><hr class='mt-1'>
    <table class='table small display table-striped w-100 border table-hover' id='tabla'>
    <div class='' id='box'><p class='d-inline'>Filtrar por: </p></div>
        <thead>
            <tr>
                <th scope='col'>tag</th>
                <th scope='col'>Cod. Plaza</th>
                <th scope='col'>Cargo</th>
                <th scope='col'>Tipo</th>
                <th scope='col'>Subtipo</th>
                <th scope='col'>Estado</th>
                <th scope='col'>Nombre</th>
                <th scope='col'>Telefono</th>
                <th scope='col'>Correo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($personal as $i){
                echo "<tr>";
                echo    "<td>{$i['tag']}</td>";
                echo    "<td>{$i['codPlaza']}</td>";
                echo    "<td>{$i['cargo']}</td>";
                echo    "<td>{$i['tipo']}</td>";
                echo    "<td>{$i['subtipo']}</td>";
                echo    "<td>{$i['estado']}</td>";
                echo    "<td>{$i['nombre']}</td>";
                echo    "<td>{$i['nroCel']}</td>";
                echo    "<td>{$i['email']}</td>";
                echo "</tr>";
            }?>
        </tbody>
    </table>
    </div>

</div>

<style>
.page-item .page-link {
    box-shadow: none;
}
    
.page-item.active .page-link {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
    box-shadow: none;
}

.page-link {
    color: #6c757d;
}

.page-link:hover {
    color: black;
}

#box {
    height: 0;
    background: red;
}

#combo {
    position: relative;
    width: 250px;
}

#tabla_info {
    font-size: medium;
    width: 80%;
    display: inline-block;
}

#tabla_paginate {
    display: inline-block;
    width: 20%;
}

.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
  background-color: rgba(0, 0, 0, 0.075);
}

</style>

<?php include('template/footer.php') ?>