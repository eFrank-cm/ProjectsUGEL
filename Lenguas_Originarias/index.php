<!doctype html>
<html lang="es">
  <!-- <?php include 'db/conexion.php';?> -->
  <?php include 'includes/head.php';?>
  <!-- Inicio del contenido de pagina -->
  <div class="container border rounded p-3 mt-2">
    <h2 class="">REGISTRO NACIONAL DE DOCENTES BILINGÜES EN LENGUAS ORIGINARIAS DEL PERÚ - 2021</h2>
    <!-- <br> -->
    <div class="row">
      <!-- Contenedor del contenido 2-->
      <div class="col-12 col-md-12">
      <!-- Contenido -->
      <div class='container-fluid col-12'>
        <form method="post" class="container-{breakpoint} border row">
            <!-- Boton buscar_distancia_bar -->
            <div class="col-3 p-2">
              <input required name="PalabraClave" type="text" class="form-control mb-1" id="inlineFormInput" placeholder="Ingrese el N° de D.N.I./C.E.">
            </div>
            <div class="col-0 pt-2 ">
              <button type="submit" class="btn btn-secondary mb-1">Buscar</button>
            </div>
        </form>
      </div>
      <!-- Consulta DB-->
      <?php
      if(!empty($_POST))
      {
          #Iniciar conexion para subsistema (test)
          include 'db/conexion.php';
          #Inicio de Consulta
          $aKeyword = explode(" ", $_POST['PalabraClave']);
          $query ="SELECT * FROM `tdocente_rndblo` WHERE NroDoc ='" . $aKeyword[0] . "'";
          $result = $db->query($query);
          ?>
          <!-- <?php  $row = $result->fetch_assoc(); echo $row['Id'];?> -->
          <!--SECCION DE BUSQUEDA-->
          <?php if(mysqli_num_rows($result) > 0) { ?>

            <div class="alert alert-success mt-2">Se encontraron resultados para el DNI/CE: <?php echo $_POST['PalabraClave']; $row['APaterno'] ?></div>
            <div>
              <section class='container-fluid col-sm-12 rounded pl-0 pr-0'><p class='text-center pb-2 border rounded border-dark font-weight-bold s-13 pt-1 w-100'><?php echo "Datos Principales"/*. $_POST['PalabraClave']*/;?></p></section>
              <div class="container">
                <div class="row">
                  <div class="col-7">
                    <div class = "form-group">
                      <label for="txtID"><label class='font-weight-bold'> Apellidos y Nombres:</label> <?php echo $row['APaterno']." ".$row['AMaterno'].", ".$row['Nombres'];?></label>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class = "form-group">
                      <label for="txtID"><label class='font-weight-bold'>Ingreso RNDBLO:</label> <?php echo $row['AnioIngresoRNDBLO'];?></label>
                    </div>
                  </div>
                  <div class="col-2">
                    <div class = "form-group">
                      <label for="txtID"><label class='font-weight-bold'>Nro Lenguas:</label> <?php echo $row['NroLenguas'];?></label>
                    </div>
                  </div>
                </div>
              <!-- MOSTRAR DATOS DE LENGUAS -->
              </div>
              <section class='container-fluid col-sm-12 rounded pl-0 pr-0'><p class='text-center pb-2 border rounded border-dark font-weight-bold s-13 pt-1 w-100'><?php echo "Datos Lenguaje Originario";?></p></section>
                <table class='table table-bordered table-hover small w-100'>
                  <tr>
                  <th scope="col">Lengua Originaria</th>
                  <th scope="col">Año Evaluación</th>
                  <th scope="col">Año Permanecia</th>
                  <th scope="col">UGEL Evaluación</th>
                  <th scope="col">Nivel Oral</th>
                  <th scope="col">Nivel Escrito</th>
                  </tr>
                  <!-- Datos Lenguas -->
                  <?php  $query ="SELECT * FROM tlenguaoriginaria WHERE Id= '".$row['Id']. "'"; $resultado = $db->query($query); ?>
                  <?php while($row = $resultado -> fetch_array())
                  {
                    ?>
                    <tr>
                          <td> <?php echo $row['LenguaOriginaria']?> </td>
                          <td> <?php echo $row['AnioEvaluacion']?> </td>
                          <td> <?php echo $row['AnioVencimiento']?> </td>
                          <td> <?php echo $row['UGEL_EvalOral']?> </td>
                          <td> <?php echo $row['Oral']?> </td>
                          <td> <?php echo $row['Escrito']?> </td>
                        </tr>
                    <?php    
                  }
                  ?>      
                  <!-- Fin - Datos Lenguas -->
                </table>
            </div>
          <?php }
            else {
              ?>
              <div class="alert alert-danger mt-2">No se encontraron resultados para el DNI/CE: <?php echo $_POST['PalabraClave']; ?></div>
              <?php
            }
          }
          ?>
      <!-- Fin Contenido -->
      </div>
    </div><!-- Fin row -->
  </div><!-- Fin container -->
  <?php include 'includes/footer.php';?>
  </body>
</html>