<?php
      ob_start();
      //ini_set('display_errors', 1);
      session_start();
      echo $_SESSION['name'];
      @include '../../back/conexion.php'; 
      if(!isset($_SESSION['name'])){
        header('location:../../index.php');
      }
      //botar de la sesion de administrador (cambiar user por admin)
      if($_SESSION['user_type']!='admin')
      {
        header('location:../../index.php');
      }
      @include '../../back/crud_users.php'; 
      include '../../img/svg_icons.php';
      ob_end_flush();
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema Boletas</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Iconos Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!-- Java Script -->        
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <!-- DATA TABLE FUNCTIONS -->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Sistema de Boletas v1.0</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control d-none" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" disabled/>
                    <button class="btn btn-primary d-none" id="btnNavbarSearch" type="button" disabled><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a id='change_password' class="dropdown-item changepass-btn" href="#!">Cambiar Contraseña</a></li>
                        <li hidden><a class="dropdown-item" href="#!">Registro de actividad</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../login/logout.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <script>

        </script>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- IMAGEN GIF-->
                            <div><img src="../../img/logonormal.gif" class="img-fluid" alt=""></div>
                            
                            <!-- FUNCIONES DE ADMINISTRADOR-->
                            <div class="sb-sidenav-menu-heading">MANTENIMIENTO</div>

                            <a class="nav-link" href="users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Usuarios
                            </a>

                            <!-- <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Agregar
                            </a>

                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Editar/Eliminar
                            </a> -->

                            <div class="sb-sidenav-menu-heading">Funciones</div>

                            <a class="nav-link" href="main_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Boletas
                            </a>
                            <a class="nav-link" href="codigos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Codigos
                            </a>
                            <!-- LAYOUTS BLOQUEADO -->
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div> -->
                            
                            <!-- BOLETAS DASHBOARD -->
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Boletas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="main_admin.php">Buscar</a>
                                    <a class="nav-link" href="#" disabled>Agregar</a>
                                    <a class="nav-link" href="#" disabled>Editar</a>
                                </nav>
                            </div> -->

                            <!-- PAGES BLOQUEADO -->
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->

                            <!-- <div class="sb-sidenav-menu-heading">Reportes</div> -->
                            <!-- <a class="nav-link" href="charts.html"> -->
                            <!-- <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Registros
                            </a> -->
                            <!-- <a class="nav-link" href="tables.html"> -->
                            <!-- <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tablas
                            </a> -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesion iniciada como:</div>
                        <span><?php echo $_SESSION['name'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

                <!-- CONTENIDO DE LA PAGINA -->
                <main>

                     <!-- MANTENIMIENTO DE USUARIOS -->
                    <div class="container border rounded p-3 mt-2">
                        <!-- <section class='container text-center col-sm-12 border rounded border-dark mb-3'>MANTENIMIENTO DE USUARIOS</section> -->
                        <h2 class='text-center border-bottom pb-2 '> MANTENIMIENTO DE USUARIOS</h2>
                        
                        <!-- AGREGAR USUARIOS -->  
                                        <?php
                                            if(isset($error))
                                            {
                                            foreach($error as $error)
                                            {
                                                echo  "<div class='alert alert-danger d-flex align-items-center alert-dismissible fade show' role='alert'>";
                                                echo  "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                                                echo  "<div> $error </div>";
                                                echo  "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                                echo  "</div>";
                                            };
                                            }
                                            elseif (isset($mensaje)) {
                                                foreach($mensaje as $mensaje)
                                                {
                                                echo  "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show' role='alert'>";
                                                echo  "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>";
                                                echo  "<div> $mensaje </div>";
                                                echo  "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                                echo  "</div>"; 
                                                };
                                            };
                                        ?>
                                    <div class="">
                                        <button type="button" class="btn btn-secondary mb-2 btn-sm" data-bs-toggle="modal" data-bs-target="#add_user">
                                        <i class="bi bi-person-plus-fill"></i>
                                            Añadir Usuario
                                        </button>
                                    </div>

                    <!--MODAL AÑADIR-->
                    <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus-fill"></i> Añadir nuevo usuario </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        </button>
                                    </div>
                                    <form action="" method="POST">

                                        <div class="modal-body">
                                            <div class="form-group pb-1">
                                                <label> DNI: </label>
                                                <input required type="number" name="dni" class="form-control" onKeyPress="if(this.value.length==8) return false;" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Nombres: </label>
                                                <input required type="text" name="fname" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32 ) || (event.charCode == 241))" style="text-transform:uppercase" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Apellidos: </label>
                                                <input required type="text" name="lname" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32 ) || (event.charCode == 241))" style="text-transform:uppercase" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Email: </label>
                                                <input required type="email" name="email" class="form-control" >
                                            </div>
                                            <div class="form-group mb-2">
                                            <label for="privilegio">Privilegios:</label>
                                            <select name ="user_type" class="form-select" aria-label="Default select example">
                                                <option selected required value="user">Usuario</option>
                                                <option required value="admin">Administrador</option>
                                            </select> 
                                            </div>
                                            <div class="form-group pmb-2">
                                            <label for="privilegio">Estado:</label>
                                            <select readonly name ="state" class="form-select" aria-label="Default select example">
                                                <option selected required value="habilitado">Activo</option>
                                            </select> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="fw-lighter">*La contraseña será el nro de DNI.</p>
                                            <div></div>
                                            <div></div>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                                            <button type="submit" name="insertdata" class="btn btn-success"> Guardar</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function () 
                            {
                                $('.editbtn').on('click', function () 
                                {
                                    console.log("OK");
                                    $('#editmodal').modal('show');
                                    $tr = $(this).closest('tr');
                                    var data = $tr.children("td").map(function () 
                                    {
                                        return $(this).text().replace(/\s+/g, " ").trim();
                                    }).get();
                                    console.log(data);
                                    $('#update_id').val(data[0]);
                                    $('#dni').val(data[1]);
                                    $('#fname').val(data[2]);
                                    $('#lname').val(data[3]);
                                    $('#email').val(data[4]);
                                    // val(5) for password and not editable for admin --- u can only reset the password
                                    $('#user_type_edit').val(data[6])
                                    $('#state_edit').val(data[7])
                                });
                            });
                        </script>
                        <!-- EDITAR USUARIOS -->  
                    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> <i class="bi bi-person-circle"></i> Editar Usuario </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form action="" method="POST">
                                    <div class="modal-body">
                                            <input type="hidden" name="update_id" id="update_id">
                                            <div class="form-group pb-1">
                                                <label> DNI: </label>
                                                <input required type="text" name="dni" id ='dni' class="form-control" onKeyPress="if(this.value.length==8) return false;" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Nombres: </label>
                                                <input required type="text" name="fname" id="fname" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32 ) || (event.charCode == 241))" style="text-transform:uppercase;" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Apellidos: </label>
                                                <input required type="text" name="lname" id="lname" class="form-control" onkeyup="this.value = this.value.toUpperCase();" onKeyPress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32 ) || (event.charCode == 241))" style="text-transform:uppercase;" >
                                            </div>
                                            <div class="form-group pb-1">
                                                <label> Email: </label>
                                                <input required type="email" name="email" id="email" class="form-control" >
                                            </div>
                                            <div class="form-group mb-2">
                                            <label for="privilegio">Privilegios:</label>
                                            <select name ="user_type" id='user_type_edit' class="form-select" aria-label="Default select example">
                                                <option required value="user">Usuario</option>
                                                <option required value="admin">Administrador</option>
                                            </select> 
                                            </div>
                                            <div class="form-group pmb-2">
                                            <label for="privilegio">Estado:</label>
                                            <select readonly name ="state" id='state_edit' class="form-select" aria-label="Default select example">
                                                <option required value="habilitado">Habilitado</option>
                                                <option required value="inactivo">Inactivo</option>
                                            </select> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                                            <button type="submit" name="updatedata" class="btn btn-success"> Guardar cambios</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- RESET PASSWORD -->
                        <script>
                            $(document).ready(function () 
                            {
                                $('.resetpass-btn').on('click', function () 
                                {
                                    console.log("OK");
                                    $('#resetmodal').modal('show');
                                    $tr = $(this).closest('tr');
                                    var data = $tr.children("td").map(function () 
                                    {
                                        return $(this).text().replace(/\s+/g, " ").trim();
                                    }).get();
                                    console.log(data);
                                    $('#reset_id').val(data[0]);
                                    $('#reset_dni').val(data[1]);
                                    $('#label-fname').text(data[2]);
                                    $('#label-lname').text(data[3]);
                                });
                            });
                        </script>


                            <!-- Modal RESET PASSWORD -->
                            
                            <div class="modal fade" id="resetmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-key"></i> Restablecer contraseña</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form action="" method="POST">
                                    <input type="hidden" name="reset_id" id="reset_id">
                                    <input type="hidden" name="reset_dni" id="reset_dni">
                                    <div class="modal-body">
                                        <div class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">Atencion!</h4>
                                            <p>Está a punto de restablecer la contraseña del usuario: <label id='label-fname'></label> <label id='label-lname'></label></p>
                                            <hr>
                                            <p class="mb-0">La contraseña será el DNI del registro.</p>                    
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                                        <button type="submit" name="restartpass" class="btn btn-success">Restablecer</button>
                                    </div>
                                    </div>
                                </form>    
                            </div>
                            </div>


                        <!-- CHANGE PASSWORD -->
                        <script>
                            $(document).ready(function () 
                            {
                                $('.changepass-btn').on('click', function () 
                                {
                                    console.log("OK");
                                    $('#changepassword').modal('show');
                                    $tr = $(this).closest('tr');
                                    var data = $tr.children("td").map(function () 
                                    {
                                        return $(this).text().replace(/\s+/g, " ").trim();
                                    }).get();
                                    console.log(data);
                                    $('#reset_id').val(data[0]);
                                    $('#reset_dni').val(data[1]);
                                    $('#label-fname').text(data[2]);
                                    $('#label-lname').text(data[3]);
                                });
                            });
                        </script>

                        <!-- Modal CHANGE PASSWORD -->
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
                            //F5 prevent upload form 
                            if ( window.history.replaceState ) {
                                window.history.replaceState( null, null, window.location.href );
                                }
                        </script>
                        

                            <div class="modal fade" id="changepassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="statichangepass" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="statichangepass"><i class="bi bi-key"></i> Cambiar contraseña</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="" method="POST">
                                <input type="hidden" name="reset_id" id="reset_id">
                                <input type="hidden" name="reset_dni" id="reset_dni">
                                <div class="modal-body">
                                    <div class="alert alert-warning mb-1" role="alert">
                                        <h4 class="alert-heading">Atencion! <span><?php echo $_SESSION['name'] ?></h4>
                                        <p><label id='label-fname'></label> <label id='label-lname'></label>Está a punto de cambiar su contraseña. </span></p>
                                        <hr>
                                        <label> Ingrese la contraseña actual: </label>
                                        <div class="input-group mb-1">
                                            <!-- <span class="input-group-text"><i class="fas fa-lock"></i></span> -->
                                            <input required type="password" class="form-control" name="contra_actual" id="pass1" placeholder="">
                                            <!-- <i class="far fa-eye" id="pruebita"  style="cursor: pointer"></i> -->
                                            <span class="input-group-text" >
                                                <!-- <input type="checkbox" id="pruebita2"/> Mostrar -->
                                                <i class="far fa-eye-slash" id="icono1" onclick="mostrar_pass('icono1','pass1');" style="cursor: pointer"></i>
                                            </span>
                                        </div>
                                        <label> Ingrese la nueva contraseña: </label>
                                        <div class="input-group mb-1">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input required type="password" class="form-control" name="contra_nueva" id="pass2" placeholder="">
                                            <!-- <i class="far fa-eye" id="pruebita"  style="cursor: pointer"></i> -->
                                            <span class="input-group-text" >
                                                <!-- <input type="checkbox" id="pruebita2"/> Mostrar -->
                                                <i class="far fa-eye-slash" id="icono2" onclick="mostrar_pass('icono2','pass2');" style="cursor: pointer"></i>
                                            </span>
                                        </div>
                                        <label> Vuelva a ingresar la nueva contraseña: </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            <input required type="password" class="form-control" name="contra_nueva_confirma" id="pass3" placeholder="">
                                            <!-- <i class="far fa-eye" id="pruebita"  style="cursor: pointer"></i> -->
                                            <span class="input-group-text" >
                                                <!-- <input type="checkbox" id="pruebita2"/> Mostrar -->
                                                <i class="far fa-eye-slash" id="icono3" onclick="mostrar_pass('icono3','pass3');" style="cursor: pointer"></i>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> Cancelar</button>
                                    <button type="submit" name="changepass" class="btn btn-success">Cambiar contraseña</button>
                                </div>
                                </div>
                            </form>    
                            </div>
                            </div>



                            
                                <!-- LISTA DE USUARIOS (Bootstrap MODAL) -->
                                <!-- <section class='container text-center mt-2 col-sm-12 border rounded border-dark mb-3'>LISTA DE USUARIOS</section> -->
                    <style>
                        .page-item .page-link 
                        {
                        box-shadow: none;
                        }

                        .page-item.active .page-link 
                        {
                        color: #fff;
                        background-color: #6c757d;
                        border-color: #6c757d;
                        box-shadow: none;
                        }
                        .page-link 
                        {
                            color: #6c757d;
                        }
                        .page-link:hover{
                            color: black;
                        }
                    </style>
                                    <table id='dataTable1' class='table table-bordered table-striped display table-hover small w-100 border-bottom' style="width:100%">
                                    <thead>
                                    <tr>
                                        <th scope="col" class ='text-center' hidden>Id</th>
                                        <th scope="col" class ='text-center'>DNI</th>
                                        <th scope="col" class ='text-center'>Nombres</th>
                                        <th scope="col" class ='text-center'>Apellidos</th>
                                        <th scope="col" class ='text-center'>Email</th>
                                        <th scope="col" class ='text-center'>Contraseña</th>
                                        <th scope="col" class ='text-center'>Nivel</th>
                                        <th scope="col" class ='text-center'>Estado</th>
                                        <th scope="col" class ='text-center'>Acción</th>
                                    </tr>
                                    </thead>
                                    <tbody>  
                                    <!-- Datos Lenguas -->
                                    <?php  $query ="SELECT * FROM `user_form`"; $resultado = $db->query($query); ?>
                                    <?php while($row = $resultado -> fetch_array()){
                                        ?>
                                        <tr>
                                            <td hidden> <?php echo $row['id']?> </td>
                                            <td> <?php echo $row['dni']?> </td>
                                            <td> <?php echo $row['names']?> </td>
                                            <td> <?php echo $row['surnames']?> </td>
                                            <td> <?php echo $row['email']?> </td>
                                            <td class ='text-center'> <?php echo $row['password']?> </td>
                                            <td> <?php echo $row['user_type']?> </td>
                                            <td> <?php echo $row['state']?> </td>
                                            <td class ='text-center'> 
                                                <button type="button" class="btn btn-outline-warning bi bi-pencil editbtn"></button> 
                                                <button type="button" class="btn btn-outline-danger bi bi-key resetpass-btn"> </button>  
                                            </td>
                                            </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>        
                                    <!-- Fin - Datos Lenguas -->
                                    </table>
                    </div>
            
                    <!--FIN DEL MAIN-->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; UGEL Canchis - Informática - 2022</div>
                            <div>
                                <a href="#">Politica de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>
