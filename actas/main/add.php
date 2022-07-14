<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Select Personalizado</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/0b15ff2be6.js" crossorigin="anonymous"></script>
    <script src='js\jquery-3.6.0.min.js'></script>
</head>
<body>
    <div class="persona">
        <form id="frmajax" method="POST">
            <input id='kw' name="kw" placeholder="Buscar...">
            <button id='btnBuscar' name='btnBuscar' type='button'>Buscar</button>
        </form>
        <div id="result">
        </div>
    </div>
    <hr>
    <div class='boleta'>
        <label for="codMod">Codigo Modular: </label>
        <input type="text" id='codMod'>

        <label for="nombres">Apellidos y Nombres: </label>
        <input type="text" id="nombres">

        <label for="condicion">Condicion: </label>
        <input type="text" id='condicion'>
    </div>
	<script src="add.js"></script>
</body>
</html>