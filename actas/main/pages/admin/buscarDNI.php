
<?php

include '../../back/conexion.php';
// $db = new mysqli('localhost', 'root', '', 'bd_conta');
// echo 'Recibi '.$_POST['dni'];
$dni = $_POST['dni'];
// $query = "SELECT * FROM persona WHERE codMod LIKE '%$dni%'";
$query = "SELECT * FROM persona WHERE (codMod LIKE '%$dni%' or DNI LIKE '%$dni%')";
$result = $db->query($query);

?>


<?php if(mysqli_num_rows($result)>0): ?>
    <hr>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Exito!</strong> Se encontró resultados para los criterios de busqueda!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <table class="table table-sm table-hover" style='margin-bottom: -5px;'>
        <thead>
            <tr>
                <th scope="col" style="display: none;">Id</th>
                <th scope="col">DNI</th>
                <th scope="col">CodModular</th>
                <th scope="col">A. Paterno </th>
                <th scope="col">A. Materno </th>
                <th scope="col">Nombres </th>
                <th scope="col">Condición</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>

            <?php while($row = $result->fetch_array()){ ?>
                <tr>
                    <td style='display: none;'><?php echo $row['id_p']?></td>
                    <td><?php echo $row['dni']?></td>
                    <td><?php echo $row['codMod']?></td>
                    <td><?php echo $row['apPaterno']?></td>
                    <td><?php echo $row['apMaterno']?></td>
                    <td><?php echo $row['nombres']?></td>
                    <td><?php echo $row['condicion']?></td>
                    <td>
                        <button type='button' class="button btn btn-warning btn-sm selectbtn"><i class="bi bi-clipboard2-check"></i> Elegir</button>    
                    </td>
                </tr>
            
        <?php } ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function()
        {

            $('.selectbtn').on('click', function (e) 
            {
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () 
                {
                    return $(this).text().replace(/\s+/g, " ").trim();
                }).get();
                console.log(data);
                $('#id_persona').val(data[0]);
                $('#inputid').val(data[0]);
                $('#inputDNI').val(data[1]);
                $('#inputCodModular').val(data[2]);
                $('#inputAPaterno').val(data[3]);
                $('#inputAMaterno').val(data[4]);
                $('#inputNombres').val(data[5]);
                $('#inputCondicion').val(data[6]);
                // // val(5) for password and not editable for admin --- u can only reset the password
                // $('#user_type_edit').val(data[6])
                // $('#state_edit').val(data[7])
            });

            // string temporal='holitas pe'.toString();
        })
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
        <strong>Error!</strong> No se encontró resultados para los criterios de busqueda!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- LOGICA DE CHECKBOX -->
    <script>
        $(document).ready(function()
        {
            document.getElementById("inputDNI").value = "";
            document.getElementById("inputCodModular").value = "";
            document.getElementById("inputApellido").value = "";
            document.getElementById("inputNombres").value = "";
            document.getElementById("inputCondicion").value = "0";
            document.getElementById("AddCheck").checked = true;
        })
    </script>
<?php endif; ?>