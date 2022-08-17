<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Select Personalizado</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
    <link href="style-Items.css" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- SELECT PERSONA -->
    <div id="select-per">
        <!-- SEARCH PERSONA -->
        <label>Buscar persona: </label><input class='rd-select' name='rd-select' name='rd-srch-per'type="radio" value='search' checked>
        <form id="frm-srch-per" method="POST">
            <input name="kw" id='kw-srch' placeholder="Buscar..." type='text'>
            <button id='btn-srch-per' type='submit'>Buscar</button>
        </form>
        <div id="res-srch-per">
        </div>
        <br>

        <!-- ADD PERSONA -->
        <label>Nueva persona: </label><input class='rd-select' name='rd-select' id='rd-add-per' type="radio" value='add'>
        <form id='frm-add-per' method='POST'>
            <label>Codigo Modular: </label><input name='codMod' id='codMod-add' type="text" disabled required onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
            <label>Apellidos y Nombres: </label><input name='nombres' id='nombres-add' type="text" disabled required>
            <label>Condicion: </label>
            <select name="condicion" id="condicion-add" disabled>
                <option value=""></option>
                <option value="ACTIVO">ACTIVO</option>
                <option value="CESANTE">CESANTE</option>
            </select>
            <button id='btn-add-per' type='submit' disabled>guardar</button>
            <div id='h'></div>
        </form>
    </div>
    <hr>

    <!-- MOSTRAR Y SELECCIONAR BOLETA Y MONTOS -->
    <div id='select-bol'>
        <div id='shw-per'>
            <label>Id: </label><input name='idp' id='idp-shw' type="text" readonly>
            <label>Codigo Modular: </label><input name='codMod' id='codMod-shw' type="text"  readonly>
            <label>Apellidos y Nombres: </label><input name='nombres' id="nombres-shw" type="text"  readonly>
            <label>Condicion: </label><input name='condicion' id='condicion-shw' type="text" readonly>
        </div>
        <br>
        <div id="div-btn-add-bol">
            <div id='div-btn'></div>

            <div id='div-bol'></div>

            <hr>
            <div id='data-bol'></div>
        </div>
    </div>
</body>
</html>

<script src="https://kit.fontawesome.com/0b15ff2be6.js" crossorigin="anonymous"></script>
<script src='..\js\jquery-3.6.0.min.js'></script>
<script src="events.js"></script>