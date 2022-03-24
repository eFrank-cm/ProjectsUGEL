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
  <?php if(count($ies)==0) {?>
    <div class="alert alert-danger">
      Se encontraron 0 coincidencias para: <strong><?php echo $kw;?></strong>
    </div>
  <?php }else{?>
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

      // echo "<div>";
      // echo "<table class='table table-hover p-2'>";
      // echo "<thead class='bg-secondary'><tr>";
      // echo "  <th>CARGO</th>";
      // echo "  <th>NOMBRE</th>";
      // echo "  <th>CORREO</th>";
      // echo "  <th>TELEFONO</th>";
      // echo "  <th>TIPO IE</th>";
      // echo "</tr></thead>";
      // echo "<tbody>";

      echo "<div class='container mt-1'>";
      foreach($personal as $docente){
        // echo "<p class='m-0'><strong>{$docente['cargo']}</strong> | {$docente['nombre']} | {$docente['dni']} | {$docente['correo']} | {$docente['telefono']}</p>";
        echo "<div class='row p-0'>";
        echo "  <div class='col-2 p-1 border-bottom'><strong>{$docente['cargo']}</strong></div>";
        echo "  <div class='col-4 p-0 border-bottom'>{$docente['nombre']}</div>";
        echo "  <div class='col-1 p-0 border-bottom'>{$docente['dni']}</div>";
        echo "  <div class='col-3 p-0 border-bottom'>{$docente['correo']}</div>";
        echo "  <div class='col-1 p-0 border-bottom'>{$docente['telefono']}</div>";
        echo "  <div class='col-1 p-0 border-bottom'>{$docente['tipo_ie']}</div>";
        echo "</div>";
        // echo "<tr class=''>";
        // echo "  <th>{$docente['cargo']}</th>";
        // echo "  <th>{$docente['nombre']}</th>";
        // echo "  <th>{$docente['correo']}</th>";
        // echo "  <th>{$docente['telefono']}</th>";
        // echo "  <th>{$docente['tipo_ie']}</th>";
        // echo "</tr>";
      }
      echo "</div>";

      // echo "</tbody>";
      // echo "</div>";

      echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    echo "<br>";
  }?>
</div>








<?php include('template/footer.php') ?>