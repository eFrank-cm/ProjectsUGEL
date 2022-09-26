<!DOCTYPE html>
<html lang="en">
    <?php
      @include '../../back/conexion.php'; 
      session_start();

      if(!isset($_SESSION['name'])){
      header('location:../../index.php');
      }

      @include '../../back/crud_users.php';
      include '../../img/svg_icons.php';
    ?>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
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
            <a class="navbar-brand ps-3" href="index.html">Duplicado Boletas</a>
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
                        <div class="small">Sesión iniciada como:</div>
                        <span><?php echo $_SESSION['name'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
<!-- CONTENIDO DE LA PAGINA -->
<main>
