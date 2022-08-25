<?php
$db = new mysqli('localhost', 'root', '', 'bd_conta');
$codMod = $_POST['search_bar']; 
$str = $_POST['search_bar'];
$delimiter = ' ';
$words = explode($delimiter, $str);

$query = "SELECT * FROM persona WHERE codMod='$words[0]'";
$result = $db->query($query);

?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<?php if(mysqli_num_rows($result)>0): $row = $result->fetch_array(); $idp = $row['id_p']; ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <strong>Exito!</strong> Se encontraron resultados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    
    <div class="card">
        <h5 class="card-header">Persona</h5>
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Cod Modular</label>
                        <input for="exampleInputEmail1" id='codMod-shw' class="text form-control form-control-sm" value="<?php echo $row['codMod']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Paterno</label>
                        <input for="exampleInputEmail1" id='apPaterno-shw' class="text form-control form-control-sm" value="<?php echo $row['apPaterno']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Materno</label>
                        <input for="exampleInputEmail1" id='apMaterno-shw' class="text form-control form-control-sm" value="<?php echo $row['apMaterno']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Nombres</label>
                        <input for="exampleInputEmail1" id='nombres-shw' class="text form-control form-control-sm" value="<?php echo $row['nombres']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                </div>
            </div>
    </div>
    
    <div class="card">
        <h5 class="card-header">Boletas</h5>
            <div class="card-body">

            <?php
            $idp = $row['id_p'];
            $query_boleta = "SELECT * FROM boleta WHERE id_p LIKE '$idp'";
            $cols_name = array('n', 'fecha', 'codPlanilla', 'anulado', 'idp', 'accion');
            $result_boletas = $db->query($query_boleta);
            
            ?>
            
            <!-- LISTA DE BOLETAS -->
            <table>
                <thead>
                    <tr>
                        <?php foreach($cols_name as $col): ?>
                            <th scope="col"><?= $col ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result_boletas->fetch_array()){ ?>
                        <tr>
                            <td><?= $row['n'] ?></td>
                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['codPlanilla']?></td>
                            <td><?= $row['anulado']?></td>
                            <td><?= $row['id_p']?></td>
                            <td>
                                <button class="editBbtn" name='editbtn-bol' id='' type='button'>Elegir</button>
                                <button class="" name='' type='button'>Ver</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- FIN LISTA DE BOLETAS -->

            </div>
    </div>

    <script>
        $(document).ready(function () 
        {
            $('.editBbtn').on('click', function () 
            {
                console.log("OK");
                $('#editBmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () 
                {
                    return $(this).text().replace(/\s+/g, " ").trim();
                }).get();
                console.log(data);

                dataTmp = data
                dataBol = {'n':dataTmp[0], 'fecha':dataTmp[1], 'codPlanilla':dataTmp[2], 'anulado':dataTmp[3]}
                dataBoleta(dataBol);



            });
        });

        // BUTTON - ADD BOLETA
        $('.modal-body-2').on('click', '#save-bol', function(){
            dataBol = getDataFormJSON('#frm-data-bol');
            if(dataBol['n']!=''){
                dataBol['accion'] = 'update';
                console.log('update');
            }
            console.log(dataBol);
            $.ajax({
                type: 'POST',
                url: '../../Items/add.php',
                data: dataBol,
                success: function(res){
                    bol = JSON.parse(res);
                    console.log(bol);
                    $('#n-data-bol').val(bol['n']);
                    $('.add-monto').prop('disabled', false)
                    $('#delbtn-bol').prop('disabled', false);

                    da = {'idp':$('#bol-idp-shw').val()};
                    $.ajax({
                        type: 'post',
                        url: '../../Items/search.php',
                        data: da,
                        success: function(res){
                            $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                            $('#div-bol').html(res);
                        }
                    }); 
                }
            })

            
            return false;
        });

        // BUTTON - DEL BOLETA
        $('.modal-body-2').on('click', '#delbtn-bol', function(){
            n = $('#n-data-bol').val();
            fecha = $('#fecha-data-bol').val();
            codPlanilla = $('#codPlanilla-data-bol').val();
            DatosBoleta = { 'n':n, 'fecha': fecha, 'codPlanilla': codPlanilla,  idp: '--', 'accion': 'del'};
            respuesta = confirm('se eliminara la boleta Nro ' + DatosBoleta['n']);
            if (respuesta){
                $.ajax({
                    type: 'post',
                    url: '../../Items/add.php',
                    data: DatosBoleta,
                    success: function(res){
                        console.log(res);

                        da = {'idp':$('#bol-idp-shw').val()};
                        $.ajax({
                            type: 'post',
                            url: '../../Items/search.php',
                            data: da,
                            success: function(res){
                                $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                                $('#div-bol').html(res);
                                $('#data-bol').html('');
                            }
                        });
                    }
                });


                
            }
            return false;
        })

        // BUTTON - ADD MONTO
        $('.modal-body-2').on('click', '.add-monto', function(){
            dataTmp = getDataRow(this);
            dataMonto = {'cod': dataTmp[1], 'monto': dataTmp[2], 'n': $('#n-data-bol').val(), 'accion': 'add'};
            console.log(dataMonto);

            $.ajax({
                type: 'post',
                url: '../../Items/add.php',
                data: dataMonto,
                success: function(res){
                    datos = JSON.parse(res);
                    rowCount = document.getElementById('tb-montos').rows.length;
                    n = 1;
                    if(rowCount > 2){
                        n = rowCount - 1;
                    }
                    tabla = document.getElementById('tb-montos').insertRow(n);
                
                    col1 = tabla.insertCell(0)
                    col2 = tabla.insertCell(1);
                    col3 = tabla.insertCell(2);
                    col4 = tabla.insertCell(3);
                    col1.innerHTML = datos['idm'];

                    col2.innerHTML = datos['cod'];
                    col2.setAttribute('contenteditable', 'true')

                    col3.innerHTML = datos['monto'];
                    col3.setAttribute('contenteditable', 'true')

                    col4.innerHTML = "<button class='del-monto'>Eliminar</button>  <button class='update-monto'>editar</button>"

                    $('#tb-montos .td-monto').empty();
                    $('#tb-montos #add-cod-monto').focus();
                }
            });
        });

        // BUTTON - DELETE MONTO
        $('.modal-body-2').on('click', '.del-monto', function(){
            dataRow = getDataRow(this);
            console.log(dataRow);
            dataDel = {'idm': dataRow[0], 'cod':dataRow[1], 'monto': dataRow[2], 'n':$('#n-data-bol').val(), 'accion': 'del'};
            $.ajax({
                type:'post',
                url: '../../Items/add.php',
                data: dataDel,
                success: function(res){
                    alert(res);
                }
            });

            $(this).closest('tr').remove();
        });

        function getDataFormJSON(idForm){
            dataObj = {};
            $($(idForm).serializeArray()).each(function(_, field){
                dataObj[field.name] = field.value;
            });
            return dataObj
        }

        function dataBoleta(datosBoleta){
            $.ajax({
                type: "POST", 
                url: "../../items/search.php",
                data: datosBoleta,
                success: function(data){
                    $('.modal-body-2').html(data);
                    $('#bol-idp-shw').val($('#idp-shw').val());
                    $('#idp-data-bol').val($('#idp-shw').val());
                    $('#bol-codMod-shw').val($('#codMod-shw').val());
                    $('#bol-nombres-shw').val($('#apPaterno-shw').val() + ' ' +  $('#apMaterno-shw').val() + ', ' + $('#nombres-shw').val());
                    $('#bol-condicion-shw').val($('#condicion-shw').val());

                    console.log(datosBoleta);
                    if(datosBoleta['fecha']!=''){
                        $('.add-monto').prop('disabled', false);
                        $('#delbtn-bol').prop('disabled', false);
                    }
                } 
            });
        }

        function getDataRow(obj){
            $tr = $(obj).closest('tr');
            data = $tr.children("td").map(function(){
                return $(this).text().replace(/\s+/g, " ").trim();
            }).get();
            return data
        }


    </script>

    <!-- <hr>
    <div class='boleta'>
        <label for="codMod">Codigo Modular: </label>
        <input type="text" id='codMod'>

        <label for="nombres">Apellidos y Nombres: </label>
        <input type="text" id="nombres">

        <label for="condicion">Condicion: </label>
        <input type="text" id='condicion'>
    </div> -->
    
<?php else:?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <strong>Error!</strong> No se encontraron resultados.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<script src='../../js/events.js'></script>