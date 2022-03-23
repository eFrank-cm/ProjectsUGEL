
<?php include("includes/a_config.php");?>
<?php include("includes/conexion.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>

<?php include("includes/design-top.php");?>

<form action="index.php" method="POST">
DNI:
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>

<?php include("includes/navigation.php");?>

<div class="container" id="main-content">
	<p>Hola mundo</p>

	
	<!-- MOSTRAR DATOS -->
	<table border="1" >
		<tr>
			<td>Tipo Documento</td>
			<td>DNI</td>
			<td>Apellido Paterno</td>
			<td>Apellido Materno</td>
			<td>Nombres</td>	
			<td>Año ingreso al RNDBLO</td>
			<td>Año Evaluación L1</td>
			<td>Año vencimiento en el Registro L1</td>
			<td>Lengua Originaria1</td>
			<td>Lengua Originaria1 sin variante</td>
		</tr>

		<?php 
		$sql="SELECT * from datos LIMIT 1";
		$result=mysqli_query($conn,$sql);
		mysqli_close($conn);
		echo "Coneccion cerrada";
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
		<tr>
			<td><?php echo $mostrar['TipoDocumento'] ?></td>
			<td><?php echo $mostrar['DNI'] ?></td>
			<td><?php echo $mostrar['ApellidoPaterno'] ?></td>
			<td><?php echo $mostrar['ApellidoMaterno'] ?></td>
			<td><?php echo $mostrar['Nombres'] ?></td>
			<td><?php echo $mostrar['AnioIngresoRNDBLO'] ?></td>
			<td><?php echo $mostrar['AnioEvaluacion'] ?></td>
			<td><?php echo $mostrar['AnioVencimientoRegistroL1'] ?></td>
			<td><?php echo $mostrar['LenguaOriginaria1'] ?></td>
			<td><?php echo $mostrar['LenguaOriginaria1SinVariante'] ?></td>

		</tr>
	<?php 
	}
	 ?>
	</table>
</div>


<?php include("includes/footer.php");?>

</body>
</html>