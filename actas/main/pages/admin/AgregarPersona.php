
<?php

include '../../back/conexion.php';
// $db = new mysqli('localhost', 'root', '', 'bd_conta');
// echo 'Recibi '.$_POST['dni'];
$dni = $_POST[''];
$query = "SELECT * FROM persona WHERE DNI = '$dni'";

$query = "INSERT INTO `persona`(`id_p`, `codMod`, `nombres`, `condicion`, `DNI`, `APaterno`, `AMaterno`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";

$result = $db->query($query);

?>

<?php if(mysqli_num_rows($result)>0): ?>


            <?php while($row = $result->fetch_array()){ ?>

                <script>
                    $(document).ready(function()
                    {
                        // string temporal='holitas pe'.toString();
                        document.getElementById("inputDNI").value = "<?= $row['DNI']; ?>";
                        document.getElementById("inputCodModular").value = "<?= $row['codMod']; ?>";
                        document.getElementById("inputApellido").value = "<?= $row['nombres']; ?>";
                        document.getElementById("inputNombres").value = "<?= $row['nombres']; ?>";
                        if ("<?= $row['condicion']; ?>" == "ACTIVO")
                        {
                            document.getElementById("inputCondicion").value = "1";
                        }
                        else
                        {
                            document.getElementById("inputCondicion").value = "2";
                        }
                        document.getElementById("AddCheck").checked = false;
                    })
                </script>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Exito!</strong> Se encontró resultados para los criterios de busqueda!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>



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