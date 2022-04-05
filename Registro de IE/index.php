<?php 
include('db/conexion.php');
include('template/head.php'); 
?>

<br>

<div class="container border p-3">
  <h3>REGISTRO DE DIRECTORES DE I.E. DEL AMBITO DE LA UGEL CANCHIS - 2022</h3>
  <hr>
  <form class='row m-0' method='post'>
    <input required name="keyword" type="text" class="col-4 form-control" id="buscar" placeholder="Ingrese el N° IE">
    <div class='col-4 pr-1'>
      <button type="submit" class="col-4 btn btn-secondary text-center pr-1 pl-1">Buscar</button>
    </div> 
  </form>
</div>

<?php  include('backend/recolect.php'); ?>

<div class="container p-0 mt-2">
  <?php if((count($ies)==0) and !empty($_POST)){?>
    <div class="alert alert-danger">
      Se encontraron 0 coincidencias para: <strong><?php echo $kw;?></strong>
    </div>
  <?php }else if(count($ies)!=0){?>
    <div class="alert alert-success">
      Se encontraron <?php echo count($ies);?> coincidencias para: <strong><?php echo $kw;?></strong>
    </div>
  <?php }?>
</div>

<div class="container mt-2 p-0">
  <?php 
  foreach($ies as $nombre_ie => $nivel) {
    echo "<div class='border m-0 p-3'>";
    echo "<h4 class='mb-0 text-center'>$nombre_ie</h4><hr class='mt-1'>";
    echo "<div class='row m-0'>";
    foreach($nivel as $nombre_nivel => $personal){
      echo "<div class='col-12 mb-4'>";
      echo "<h5 class='mb-0'>$nombre_nivel</h5>";
      echo "<div class='container-fluid mt-1'>";
      foreach($personal as $docente){
        echo "<div class='row p-0 small'>";
        echo "  <div class='col-2 p-1'><strong>{$docente['cargo']}</strong></div>";
        echo "  <div class='col-4 p-0'>{$docente['nombre']}</div>";
        echo "  <div class='col-1 p-0'>{$docente['dni']}</div>";
        echo "  <div class='col-3 p-0'>{$docente['correo']}</div>";
        echo "  <div class='col-1 p-0z'>{$docente['telefono']}</div>";
        echo "  <div class='col-1 p-0'>{$docente['tipo_ie']}</div>";
        echo "</div>";
      }
      echo "</div>";
      echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "<br>";
  }?>
</div>

<?php include('template/footer.php') ?>