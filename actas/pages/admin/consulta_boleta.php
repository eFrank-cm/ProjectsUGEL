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
                    <input id='idp-shw' type="text" value='<?= $row['id_p'] ?>' hidden>
                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Cod Modular</label>
                        <input for="exampleInputEmail1" id='codMod-shw' class="text form-control form-control-sm" value="<?php echo $row['codMod']?>" disabled="disabled" readonly></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Paterno</label>
                        <input for="exampleInputEmail1" id='apPaterno-shw' class="text form-control form-control-sm" value="<?php echo $row['apPaterno']?>" disabled="disabled" readonly></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Materno</label>
                        <input for="exampleInputEmail1" id='apMaterno-shw' class="text form-control form-control-sm" value="<?php echo $row['apMaterno']?>" disabled="disabled" readonly></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Nombres</label>
                        <input for="exampleInputEmail1" id='nombres-shw' class="text form-control form-control-sm" value="<?php echo $row['nombres']?>" disabled="disabled" readonly></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-2">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Condición</label>
                        <input for="exampleInputEmail1" id='condicion-shw' class="text form-control form-control-sm" value="<?php echo $row['condicion']?>" disabled="disabled" readonly></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                </div>
            </div>
    </div>
    <br>
    <div class="card" id='hh'>
            <!-- <h5 class="card-header">Boletas</h5>
            <div class="card-body card" id='div-bol'> -->
        <h5 class="card-header mt-1">Boletas
        <!-- BOTON PARA ABRIR MODAL DE AGREGAR BOLETA -->
        <button type="button" class="btn btn-secondary btn-sm float-end" id='btn-add-bol'>
            <i class="bi bi-card-list"></i> Agregar Boleta
        </button>
        <script>
            
        </script>
        <!-- FIN BOTON PARA ABRIR MODAL DE AGREGAR BOLETA -->

        <!-- MODAL DE AGREGAR BOLETA -->
        <div class="modal m-1 fade" id="myModal2">
            <div class="modal-dialog modal-xl">
                <div class="modal-content p-1">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Boleta</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <form class="col container border rounded p-1">

                        <div class="card">
                            <h5 class="card-header">Persona</h5>

                        <div class="card-body">
                            <div class="row align-items-start">
                                <div class="col-auto">
                                    <label for="inputPassword2" class="">Ingrese DNI/Cod Modular</label>
                                    <input type="text" class="form-control form-control-sm" id="tb-buscador" placeholder="">

                                    <div class="form-check form-switch" style="position:relative; top:20px; right:-50px;    ">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Agregar Nueva Persona</label>
                                    </div>
                                    <button class="btn btn-primary mb-3 btn-sm" style ="position: relative; top: 23px;">Buscar</button>
                                </div>
                        </div>
                        <hr>

                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                        </div>

                    </form>

                <!-- Modal body -->
                <div class="modal-body-2">
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

                </div>
            </div>
        </div>
        <!-- FIN MODAL DE AGREGAR BOLETA -->


        </h5>
            <div class="card-body" id='div-bol'>
                <?php
                $idp = $row['id_p'];
                $query_boleta = "SELECT * FROM boleta WHERE id_p LIKE '$idp' ORDER BY n DESC";
                $cols_name = array('Nº', 'LUGAR Y FECHA', 'COD PLANILLA', 'ANULADO', 'IDP', 'ACCION');
                $result_boletas = $db->query($query_boleta);
                
                ?>
                
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
                
                <!-- LISTA DE BOLETAS -->
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
                        <?php while($row = $result_boletas->fetch_array()){ ?>
                            <tr>
                                <td><?= $row['n'] ?></td>
                                <td><?= $row['fecha'] ?></td>
                                <td><?= $row['codPlanilla']?></td>
                                <td><?php
                                    if($row['anulado']=='TRUE'){
                                        echo $row['anulado'];
                                    }
                                ?></td>
                                <td hidden><?= $row['id_p']?></td>
                                <td>
                                    <button class="btn btn-outline-success btn-sm editbtn" name='editbtn-bol' type='button'><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-outline-primary btn-sm verbtn-bol" type='submit'><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- FIN LISTA DE BOLETAS -->

            </div>
    </div>
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