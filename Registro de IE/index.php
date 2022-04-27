<?php 
include('backend/conexion.php');
include('template/head.php'); 
?>

<br>
<div class="container border p-3">
  <h3>REGISTRO DE DIRECTORES DE I.E. DEL AMBITO DE LA UGEL CANCHIS - 2022</h3>
  <hr>
  <form class='row m-0' method='post'>
    <input required name="keyword" type="text" class="col-4 form-control w-25" placeholder="Ingrese el N° IE">
    <div class='col-4 pr-1'>
      <button type="submit" class="col-4 btn btn-secondary text-center pr-1 pl-1">Buscar</button>
    </div> 
  </form>
</div>

<?php  include('backend/recolect.php'); ?>

<div class="container p-0 mt-2">
  <?php 
  if((count($ies)==0) and array_key_exists('keyword', $_POST))
    echo "<div class='alert alert-danger'> Se encontraron 0 coincidencias para: <strong> $kw</strong></div>";
  else if(count($ies)!=0){
    $aux = count($ies);
    echo "<div class='alert alert-success'> Se encontraron $aux coincidencias para: <strong> $kw</strong></div>";
  }
  ?>
</div>
<div class="container p-0">
  <?php
  foreach($ies as $c => $ie) {
    $nameForm = 'form'.$c;
    echo "<div class='border m-0 p-3'>";
    echo "<h4 class='mb-0 text-left d-inline'>{$ie['nombreIE']} </h4><label>{$ie['nivel']}</label><hr class='mt-1'>";
    //echo "<h6 class='d-inline'>Nivel Educativo: </h6> <label>{$ie['nivel']}</label> <br>";
    echo  "<h6>Tipo de Institucion: </h6><label>{$ie['tipoIE']}</label>";
    echo  "<h6>Ubicacion: </h6> <label>{$ie['ubicacion']}</label>";
    echo  "<h6>Codigo Modular: </h6> <label>{$ie['codModIE']}</label>";
    

    echo "<form id='$nameForm' method='post'>";
    echo "<input hidden name='codModIE' type='text' value='{$ie['codModIE']}'>";
    echo "<input hidden name='nivel' type='text' value='{$ie['nivel']}'>";
    echo "<input hidden name='tipoIE' type='text' value='{$ie['tipoIE']}'>";
    echo "<input hidden name='ubicacion' type='text' value='{$ie['ubicacion']}'>";
    echo "<input hidden name='nombreIE' type='text' value='{$ie['nombreIE']}'>";
    ?>  
    <button class='btn btn-secondary' type='submit' onclick="enviar('datosIE.php', '<?php echo $nameForm; ?>')">Ver mas</button>
    <?php
    echo "</form>";
    echo "</div>";
    echo "<br>";
  }?>
</div>
<?php include('template/footer.php') ?>