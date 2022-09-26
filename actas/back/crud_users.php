<?php
#------Añadir datos-------
if(isset($_POST['insertdata'])){
   $dni = $_POST['dni'];
   $name = mysqli_real_escape_string($db, $_POST['fname']);
   $lname = mysqli_real_escape_string($db, $_POST['lname']);
   $email = mysqli_real_escape_string($db, $_POST['email']);
   $pass = md5($_POST['dni']);
   $cpass = md5($_POST['dni']);
   $user_type = $_POST['user_type'];
   $state = $_POST['state'];
   $select = " SELECT * FROM user_form WHERE email = '$email'";
   $result = mysqli_query($db, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'ERROR: El usuario ingresado ya existe!';
   }
   else{
      if($pass != $cpass){
         $error[] = 'ERROR: La contraseña no coincide!';
      }else{
         $insert = "INSERT INTO user_form(dni, names, surnames, email, password, user_type,state) VALUES('$dni','$name','$lname','$email','$pass','$user_type','$state')";
         mysqli_query($db, $insert);
         #header('location:login_index.php');
         $mensaje[] = 'EXITO! Se agregó correctamente un nuevo usuario!';
         // echo "<div class='alert alert-success'>Se agregó correctamente un nuevo usuario</div>";
      }
   }
};

#------Editar datos-------
if(isset($_POST['updatedata']))
{
    $id = $_POST['update_id'];
    $dni = $_POST['dni'];
    $name = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $pass = md5($_POST['dni']);
    $cpass = md5($_POST['dni']);
    $user_type = $_POST['user_type'];
    $state = $_POST['state'];
    $select = " SELECT * FROM user_form WHERE id = '$id'";
    $result = mysqli_query($db, $select);
    if(mysqli_num_rows($result) < 1)
    {
        $error[] = 'ERROR: El usuario no existe!';
    }
    else
    {
        $update = " UPDATE user_form SET dni ='$dni', name='$name', lname='$lname', email='$email', user_type='$user_type', state='$state' WHERE id='$id'  ";
        #echo $update;
        mysqli_query($db, $update);
        #header('location:login_index.php');
        $mensaje[] = 'EXITO! Se guardaron los cambios correctamente!';
        // echo "<div class='alert alert-success'>Se agregó correctamente un nuevo usuario</div>";
    }
 };
 #------Restablecer contraseña-------
if(isset($_POST['restartpass']))
{
    $id = $_POST['reset_id'];
    $pass = md5($_POST['reset_dni']);
    $select = " SELECT * FROM user_form WHERE id = '$id'";
    $result = mysqli_query($db, $select);
    if(mysqli_num_rows($result) < 1)
    {
        $error[] = 'ERROR: El usuario no existe!';
    }
    else
    {
        $update = " UPDATE user_form SET password ='$pass' WHERE id='$id'  ";
        #echo $update;
        mysqli_query($db, $update);
        $mensaje[] = 'EXITO! Se restableció la contraseña!';
    }
 };
 #------Cambiar Contraseña-------
if(isset($_POST['changepass'])){
    $id_user = $_SESSION['id'];
    $old_pass = md5($_POST['contra_actual']);
    $new_pass = md5($_POST['contra_nueva']);
    $new_pass_conf = md5($_POST['contra_nueva_confirma']);
    $select = " SELECT * FROM user_form WHERE id = '$id_user' AND password='$old_pass'";
    $result = mysqli_query($db, $select);
 
    if(mysqli_num_rows($result) < 1){
       $error[] = 'ERROR: No se entrontró al usuario o la contraseña actual es incorrecta!';
    }else{
 
       if($new_pass != $new_pass_conf){
          $error[] = 'ERROR: La nueva contraseña ingresada no coincide!';
       }else{
          $change_pass_sql = " UPDATE user_form SET password ='$new_pass' WHERE id='$id_user'  ";
          mysqli_query($db, $change_pass_sql);
          #header('location:login_index.php');
          $mensaje[] = 'EXITO! Se cambió la contraseña!';
          // echo "<div class='alert alert-success'>Se agregó correctamente un nuevo usuario</div>";
       }
    }
 };
?>