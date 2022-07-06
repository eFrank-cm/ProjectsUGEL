<!DOCTYPE html>
<html lang="ES">
    <?php
      @include '../../back/conexion.php'; 
      session_start();

      if(!isset($_SESSION['name'])){
      header('location:../../index.php');
      }
      //botar de la sesion de administrador (cambiar user por admin)
      if($_SESSION['user_type']!='admin')
      {
        header('location:../../index.php');
      }

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

        <?php include('../../img/svg_icons.php'); ?>

        <script>
                if ( window.history.replaceState ) 
                {
                window.history.replaceState( null, null, window.location.href );
                }
                $(document).ready(function()
                {
                    $('#datatablesSimple').DataTable(
                        {
                        //cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json
                        // "language": {"url": "//es-datatables.json"},
                        "language": {url: '../../json/es-ES.json'},
                        // "scrollY": true,
                        "pageLength": 25,

                        });
                });
        </script>
        <style>
        .form-control-sm {
            min-height: calc(1.5em + 0.5rem + 2px);
            padding: -3.75rem 0.5rem;
            font-size: 0.875rem;
            /* position: relative;
            left: 455px; */
            border-radius: 0.2rem;
        }

        .dataTables_filter {
        /* width: 60%; */
        float: right;
        margin-bottom: 5px;
        /* text-align: right; */
        }


        /* STYLE BUTTONS DATATABLE */
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
    </head>

    <!-- DATABLE EN ESPAÑOL -->




    <body class="sb-nav-fixed">
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
                        <li><a class="dropdown-item" href="#!">Cambiar Contraseña</a></li>
                        <li><a class="dropdown-item" href="#!">Registro de actividad</a></li>
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

                            <a class="nav-link" href="main_users.php">
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

                            <div class="sb-sidenav-menu-heading">Interface</div>
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
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
                            </div>

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

                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Sesión iniciada como:</div>
                        <span><?php echo $_SESSION['name'] ?>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
 
    <!-- CONTENIDO DE LA PAGINA -->
    <main>              
    <!-- YA NO DEBE TENER BORDER EL DIV CONTAINER -->
    <div class="container">
        <h3 style="text-align: center;">REGISTRO DE PERSONAS <a href="../../add.php">agregar</a></h3>
        <form class='row m-0' method='POST'>
            <input required name="keyword" type="text" class="col-4 form-control h-10" style="width: 350px;" placeholder="Ingrese Apellidos, Nombres o Cod Modular">
            <div class='col-4 pr-1'>
                <button type="submit" class="col-3 btn btn-secondary text-center btn-sm pr-1 pl-1 pb-1" style = "position:relative; left:-5px; top:4px;" ><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>

        <?php include('../../back/get_personaBoleta.php'); ?>
            <?php
                            if(isset($error))
                            {
                                foreach($error as $error)
                                {
                                    echo  "<div class='alert alert-danger d-flex align-items-center alert-dismissible fade show mt-3 mb-0' role='alert'>";
                                    echo  "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
                                    echo  "<div> $error </div>";
                                    echo  "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                    echo  "</div>";
                                };
                            }
                            elseif (isset($mensaje)) {
                                foreach($mensaje as $mensaje)
                                {
                                    echo  "<div class='alert alert-success d-flex align-items-center alert-dismissible fade show mt-3 mb-0' role='alert'>";
                                    echo  "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>";
                                    echo  "<div> $mensaje </div>";
                                    echo  "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                    echo  "</div>"; 
                                };
                            };
            ?>
        <hr>
    </div>
        
                <?php if(!empty($personas)): ?>
                <div class='container'><table id='datatablesSimple' class='table table-bordered table-striped table-hover small border-bottom'>
                <thead>
                    <tr>
                        <th scope='col' class ='text-center' style ='width: 5%;'>N</th>
                        <th scope='col' class ='text-center' style ='width: 10%;'>Cod Modular</th>
                        <th scope='col' class ='text-center' style ='width: 20%;'>Nombres</th>
                        <th scope='col' class ='text-center' style ='width: 20%;'>Fecha</th>
                        <th scope='col' class ='text-center' style ='width: 10%;'>Planilla</th>
                        <th scope='col' class ='text-center' style ='width: 10%;'>Condicion</th>
                        <th scope='col' class ='text-center' style ='width: 5%;'>Acción</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($personas as $per): ?>
                        <tr>
                            <td class ='text-center'><?= $per['n'] ?></td>
                            <td class ='text-center'><?= $per['codMod'] ?></td>
                            <td class ='text-center'><?= $per['nombres'] ?></td>
                            <td class ='text-center'><?= $per['fecha'] ?></td>
                            <td class ='text-center'><?= $per['codPlanilla'] ?></td>
                            <td class ='text-center'><?= $per['condicion'] ?></td>
                            <td class ='text-center'style ='width: 50;'>
                                <form action='../../back/index4.php' target="_blank" method='post'>
                                    <input hidden type='text' value = '<?= implode_keys('; ', $per) ?>' name='array'>
                                    <button class='btn btn-outline-success bi bi-eye btn-sm' type='submit'> </button>
                                </form>                        
                                <!-- <a target="_blank" class="btn btn-outline-primary bi bi-box-arrow-down btn-sm" href="#" download></a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>        
                </table></div>
                <?php endif; ?>
                

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
        <script src="../../assets/demo/chart-area-demo.js"></script>
        <script src="../../assets/demo/chart-bar-demo.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <script src="../../js/datatables-simple-demo.js"></script>
    </body>
</html>
