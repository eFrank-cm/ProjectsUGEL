<form method='post'>
    <div name='persona'><h4>Datos de la Persona</h4>
        <label for='codMod'>Codigo Modular: </label>
        <input name='codMod' id='codMod' type="text">
        <label for="nuevo">Nueva Persona</label>
        <input name='nuevo' type="checkbox">
        <br><br>
        <label for='nombre'>Nombre: </label>
        <input name='nombre' id='nombre' type="text">
        <br><br>
        <label for='condicion'>Condicion: </label>
        <input name='condicion' id='condicion' type="text">
    </div>
    <hr>
    <div name='boleta'><h4>Datos de la Boleta</h4>
    <label for='fecha'>Fecha: </label>
        <input name='fecha' id='fecha' type="text">
        <br><br>
        <label for='codPlanilla'>Codigo de Planilla: </label>
        <input name='codPlanilla' id='codPlanilla' type="text">
    </div>
    <hr>
    <div name='monto'><h4>Montos de la Boleta</h4>
    <table>
        <thead>
            <th>codigos</th>
            <th>monto</th>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name='c1'></td>
                <td><input type="text" name='m1'></td>
            </tr>
            <tr>
                <td><input type="text" name='c2'></td>
                <td><input type="text" name='m2'></td>
            </tr>
        </tbody>
    </table>
    <button type='buttom' onclick='' value='Insertar fila'></button>
    </div>
    <hr>
    <button type='submit'>enviar</button>
</form>
<!-- Loggica de la Pg -->
<script>

</script>

<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";

?>
