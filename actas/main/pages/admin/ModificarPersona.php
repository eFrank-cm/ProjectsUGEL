
<?php

include '../../back/conexion.php';
// $db = new mysqli('localhost', 'root', '', 'bd_conta');
// echo 'Recibi '.$_POST['dni'];
$input_id_persona = $_POST['input_id_persona'];
$input_dni = $_POST['input_dni'];
$input_codmodular = $_POST['input_codmodular'];
$input_apaterno = $_POST['input_apellidoP'];
$input_amaterno = $_POST['input_apellidoM'];
$input_nombres = $_POST['input_nombres'];
$input_condicion = $_POST['input_condicion'];

$query = "UPDATE `persona` SET `codMod`='$input_codmodular',`nombres`='$input_nombres',`condicion`='$input_condicion',`DNI`='$input_dni',`APaterno`='$input_apaterno',`AMaterno`='$input_amaterno' WHERE id_p='$input_id_persona'";

$result = $db->query($query);
?>

<?php if(mysqli_result($result)): ?>
    <hr>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Exito!</strong> Se Modificaron los datos de la persona!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
        <strong>Error!</strong> No se modificaron los datos!
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
            document.getElementById("AddCheck").checked = false;
        })
    </script>
<?php endif; ?>