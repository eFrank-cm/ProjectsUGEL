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
                        <li><a id='change_password' class="dropdown-item changepass-btn" href="#!">Cambiar Contrase帽a</a></li>
                        <li><a class="dropdown-item" href="#!">Registro de actividad</a></li>
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
                        <div class="small">Sesion iniciada como:</div>
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
<br>
<!-- TABLAS DE CODIGO -->
<div id='divtb-posneg' class="container border" >
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src='codigos.js'></script>


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


                    


