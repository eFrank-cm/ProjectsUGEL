<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='.\js\jquery-3.6.0.min.js'></script>
    <script src='./add.js'></script>
    <title>Document</title>
</head>
<body>
    <form id='frmajax' method='POST'>
        <input type="text" name='codMod' id='codMod'>
        <input type="text" name='nombre' id='nombre'>
        <input type="text" name='condicion' id='condicion'>
        <button id='btnguardar'>Guardar</button>
    </form>
    <br>
    <div>
        <label for="h">aqui esta: </label>
        <input type="text" name="h" id="h">
    </div>
</body>
</html>


<!-- <form method='post' action='#'>
    <div name='persona'><h4>Datos de la Persona</h4>
        <label for='codMod'>Codigo Modular: </label>
        <input name='codMod' id='codMod' type="text">
        <input type='button' onclick='buscarPer()' value='Buscar'>

        <label for="nuevo">Nueva Persona</label>
        <input name='nuevo' type="checkbox">

        <br><br>
        <label for='nombre'>Nombre: </label>
        <input name='nombre' id='nombre' type="text" readonly>
        <br><br>
        <label for='condicion'>Condicion: </label>
        <input name='condicion' id='condicion' type="text" readonly>
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
    <table id='tbDatos'>
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
            <tr>
                <td><input type="text" name='c3'></td>
                <td><input type="text" name='m3'></td>
            </tr>
        </tbody>
    </table>
    <input type='button' onclick='insertarFila()' value='Insertar fila'>
    </div>
    <hr>
    <button type='submit'>enviar</button>
</form> -->

