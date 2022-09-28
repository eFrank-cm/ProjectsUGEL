<?php //include("../templates/head.php"); ?>
<?php
ob_start();
session_start();
echo $_SESSION['name'];
@include '../../back/conexion.php'; 
if(!isset($_SESSION['name'])){
header('location:../../index.php');
}

include '../../img/svg_icons.php';
@include '../../back/crud_users.php';
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
        <!-- NAV BAR - TOP -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Sistema de Boletas</a>
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

        <!-- SIDE BAR - LEFT -->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- IMAGEN GIF-->
                            <div><img src="../../img/logonormal.gif" class="img-fluid" alt=""></div>
                            <!-- MANTENIMIENTO-->
                            <?php if($_SESSION['user_type']=='admin'): ?>
                                <div class="sb-sidenav-menu-heading">MANTENIMIENTO</div>
                                <a class="nav-link" href="users.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Usuarios
                                </a>
                            <?php endif; ?>

                            <!-- FUNCIONES  -->
                            <div class="sb-sidenav-menu-heading">FUNCIONES</div>
                            <a class="nav-link" href="<?= $_SESSION['user_type']=='admin'?"main_admin.php":"main_users.php" ?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Boletas
                            </a>
                            <a class="nav-link" href="codigos.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Codigos
                            </a>
                        </div>
                    </div>

                    <!-- FOOTER SIDE BAR -->
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesión iniciada como:</div>
                        <span><?php echo $_SESSION['name'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
<!-- CONTENIDO DE LA PAGINA -->
<main>

<br>
<div class='container row'>
    <div class="col-3">
        <h2 class='text-center'>CODIGO DE BOLETAS</h2>
    </div>
    <div class='d-flex justify-content-center col-7'>
        <form id='addfrm-cod' class='form-group' method='post'>
            <div class="row align-items-start">
                <div class="col-4"><label class="form-label fw-bolder">Etiqueta: </label></div>
                <div class="col-4"><label class="form-label fw-bolder">Tipo: </label></div>
            </div>
            <div class="row align-items-start">
            <div class="col-4"><input id='tag' class="text form-control form-control-sm" name='tag' type="text"></input></div>
                <div class="col-4">
                    <select id='tipo' class="form-select form-select-sm" name='tipo' type="text">
                        <option value=""></option>
                        <option value="ingreso">INGRESO</option>
                        <option value="egreso">EGRESO</option>
                    </select>
                </div>
                <div class="col-2"><button class='btn btn-sm btn-outline-success d-inline' id='addbtn-cod' type='submit'>Agregar</button></div>
                <div class="col-2" hidden><button class='btn btn-sm btn-outline-success d-inline' id='updbtn' type='submit'>Actualizar</button></div>
            </div>
        </form>
    </div>
</div>
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
<br>
<!-- TABLAS DE CODIGO -->
<div id='divtb-posneg' class="container border" >
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='codigos.js'></script>

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

<?php //include("../templates/footer.php"); ?>


                    


