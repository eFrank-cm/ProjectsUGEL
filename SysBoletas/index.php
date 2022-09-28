<?php
ob_start();
@include './back/conexion.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($db, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($db, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if(($row['user_type'] == 'admin')&&($row['state'] == 'habilitado')){
         $_SESSION['name'] = $row['names'];
         $_SESSION['id'] = $row['id'];
         $_SESSION['user_type'] = $row['user_type'];
         header('location: ./pages/admin/main_admin.php');
      }
      elseif(($row['user_type'] == 'user')&&($row['state'] == 'habilitado')){

         $_SESSION['name'] = $row['names'];
         $_SESSION['id'] = $row['id'];
         $_SESSION['user_type'] = $row['user_type'];
         header('location: ./pages/admin/main_users.php');
      } 
      else{
         $error[] = 'La cuenta ingresada está inactiva!';
      }
   }
   else{
      $error[] = 'El email o la contraseña son incorrectas!';
   }

   
};
ob_end_flush();
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
   if ( window.history.replaceState ) {
   window.history.replaceState( null, null, window.location.href );
   }
</script>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login UGEL-CANCHIS</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>


<div class="form-container-login">

   <form action="" method="post">
   <div class="container d-inline">
      <img src="img/ugel-canchis.png" class="img-fluid" alt="Responsive image"> 
   </div>
      <!-- <h3>LOGIN TDSystem</h3> -->
      <h1 class="display-6">LOGIN BOLETAS</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

   <script type="text/javascript">
          function mostrar_pass(icono_objeto, input_objeto)
          {
            $(document).ready(function () 
            {
                if ($("#"+input_objeto).attr("type")=="password")
                {
                    $("#"+icono_objeto).removeClass("fa-eye-slash");
                    $("#"+icono_objeto).addClass("fa-eye");
                    $("#"+input_objeto).attr("type", "text");
                }
                else
                {
                    $("#"+icono_objeto).removeClass("fa-eye");
                    $("#"+icono_objeto).addClass("fa-eye-slash");
                    $("#"+input_objeto).attr("type", "password");
                }
            }); 
          }
    </script>
      <div class="input-group" style ='position: relative;'>
         <span class="input-group-text" style ='height: 39.5px; position: relative;bottom: -8px;'><i class="fa fa-user"></i></span>
         <input required type="email" class="form-control" name="email" required placeholder="Ingrese su usuario">
      </div>
      <!-- <input required type="password" class="form-control" name="password" required placeholder="Ingrese su contraseña"> -->

      <div class="input-group" style ='position: relative;'>
         <span class="input-group-text" style ='height: 39.5px; position: relative;bottom: -8px;'><i class="fas fa-lock"></i></span>
         <input required type="password" class="form-control" name="password" id="pass2" placeholder="Ingrese su contraseña">
         <!-- <i class="far fa-eye" id="pruebita"  style="cursor: pointer"></i> -->
         <span class="input-group-text" style ='height: 39.5px; bottom: -8px; right:0;position: relative;'>
               <!-- <input type="checkbox" id="pruebita2"/> Mostrar -->
               <i class="far fa-eye-slash" id="icono2" onclick="mostrar_pass('icono2','pass2');" style="cursor: pointer;user-select:none;"></i>
         </span>
      </div>
      <input type="submit" name="submit" value="Ingresar" class="btn btn-secondary">
      <p>No tienes una cuenta? <a target="_blank" href="https://api.whatsapp.com/send?phone=+51932294692&text=Buen%20Día.%20Solicito%20nuevo%20usuario%20para%20el%20sistema%20de%20archivos%20de%20tramite%20documentario.">Solicita un registro</a></p>
      
   </form>

</div>

</body>
</html>