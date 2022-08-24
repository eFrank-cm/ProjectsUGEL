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
                        <input for="exampleInputEmail1" class="text form-control form-control-sm" value="<?php echo $row['codMod']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Paterno</label>
                        <input for="exampleInputEmail1" class="text form-control form-control-sm" value="<?php echo $row['nombres']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-3">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Apellido Materno</label>
                        <input for="exampleInputEmail1" class="text form-control form-control-sm" value="<?php echo $row['nombres']?>" disabled="disabled" style='background: white;'></input>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="col-4">
                        <label for="exampleInputEmail1" class="form-label fw-bolder">Nombres</label>
                        <input for="exampleInputEmail1" class="text form-control form-control-sm" value="<?php echo $row['nombres']?>" disabled="disabled" style='background: white;'></input>
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
                // $('#update_id').val(data[0]);
                // $('#dni').val(data[1]);
                // $('#fname').val(data[2]);
                // $('#lname').val(data[3]);
                // $('#email').val(data[4]);
                // // val(5) for password and not editable for admin --- u can only reset the password
                // $('#user_type_edit').val(data[6])
                // $('#state_edit').val(data[7])
            });
        });
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