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

        <!-- AUTOCOMPLETE -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.02.min.css">

        <!-- TYPEHEAD CSS -->
        <link href="../../js/bootstrap.min.css" rel="stylesheet" />
        <!-- <script src="../../js/bootstrap.bundle.min2.js"></script> -->
        <script src="../../js/autocomplete.js"></script>

        <!-- SWEET ALERT -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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

        /* Input numerico sin flechas */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
        <h3 style="text-align: center;">REGISTRO DE PERSONAS <a href="../../Items/items.php">agregar</a></h3>
        <form class='row m-0' method='POST'>
            <input required name="keyword" type="text" class="col-4 form-control h-10" style="width: 350px;" placeholder="Ingrese Apellidos, Nombres o Cod Modular">
            <div class='col-4 pr-1'>
                <button type="submit" class="col-3 btn btn-secondary text-center btn-sm pr-1 pl-1 pb-1" style = "position:relative; left:-5px; top:4px;" ><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form>

       <!-- ==================BOTON AGREGAR BOLETA - MODAL================= -->
        <!-- ==================INICIO================= -->
        <div class='col-3'> 
            <button type="" class="btn btn-secondary btn-sm addboletabtn" data-bs-toggle="modal" data-bs-target="#addmodal"><i class="bi bi-file-earmark-plus"></i> Agregar</button>
        </div>
                
        <!-- ==================INICIO================= -->
        <!-- ==================INICIO================= -->
        <!-- ==================INICIO================= -->
        <!-- <form class='row m-0' method='POST'>
            <div class="autoComplete_wrapper">
                <input id="autoComplete" type="search" style='border-radius:4px; border-color: rgba(206,212,218,255); color: rgba(108,117,125,255);' dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">            <div class='col-4 pr-1'>
                <button type="submit" class="col-3 btn btn-secondary text-center btn-sm pr-1 pl-1 pb-1" style = "position:relative; left:-5px; top:4px;" ><i class="bi bi-search"></i> Buscar</button>
            </div>
        </form> -->


        <form id="frmajax" method="POST">
            <div class="row">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-6">
                    <div class="autoComplete_wrapper">
                        <input id="autoComplete" name="search_bar" type="search" style='border-radius:4px; border-color: rgba(206,212,218,255); color: rgba(108,117,125,255); width: 633px;' dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off">
                    </div>
                </div>
                <div class="col-md-2 ">
                    <button type="button" id='main-searcher' class="btn btn-secondary" style='position:relative; top:5px;'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layer-backward" viewBox="0 0 16 16">
                    <path d="M8.354 15.854a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 0-.708l1-1a.5.5 0 0 1 .708 0l.646.647V4H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H9v7.793l.646-.647a.5.5 0 0 1 .708 0l1 1a.5.5 0 0 1 0 .708l-3 3z"/>
                    <path d="M1 9a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4.5a.5.5 0 0 1 0 1H1v2h4.5a.5.5 0 0 1 0 1H1zm9.5 0a.5.5 0 0 1 0-1H15V6h-4.5a.5.5 0 0 1 0-1H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4.5z"/>
                    </svg> Elegir 2.0</button>
                </div>
                <div class="col-md-1">&nbsp;</div>
            </div>
        </form>


        <div class="autoComplete_wrapper">
        <!-- <input id="autoComplete" type="search" style='border-radius:4px; border-color: rgba(206,212,218,255); color: rgba(108,117,125,255);' dir="ltr" spellcheck=false autocorrect="off" autocomplete="off" autocapitalize="off"> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>
    
    <?php

        //$query = "SELECT nombres FROM persona ORDER BY nombres ASC";    
        $query = "SELECT CONCAT (`codMod`,' ',`nombres`) as nombres FROM `persona` ORDER BY nombres ASC";
        $result = $db->query($query);
        $data2 = array();
        
        //$query = "SELECT nombres FROM persona ORDER BY nombres ASC";   
        while($row = $result->fetch_array())
        {
            
            $data2[] = array($row["nombres"]);
        }
        //print_r($data);
        //echo json_encode($data2);
    ?>

    <script>
        var array_especificaciones = <?php echo json_encode($data2) ?>;
        var n = array_especificaciones.length; //obtienes la longitud
        var arreglo_busqueda = [];
        for(var i = 0;i<n;i++)
        {
            arreglo_busqueda[i]=array_especificaciones[i];
        }
        console.log(arreglo_busqueda);
    </script>

    <script>
        const autoCompleteJS = new autoComplete({
            placeHolder: "Buscar Codigo Modular/Nombres",
            data: {
                src: arreglo_busqueda,
                cache: true,
            },
            resultItem: {
                highlight: true
            },
            events: {
                input: {
                    selection: (event) => {
                        const selection = event.detail.selection.value;
                        autoCompleteJS.input.value = selection;
                    }
                }
            }
        });
    </script>



        <!-- ==================FIN================= -->
        <!-- ==================FIN================= -->
        <!-- ==================FIN================= -->



        <!-- ==================INICIO================= -->
                    <!--MODAL AÑADIR-->
                    <!-- <div class="modal-dialog modal-xl" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        </div> -->
        <!-- ==================SCRIPT ABRIR MODAL AGREGAR BOLETA================= -->
                <!-- <script>
                    $(document).ready(function () 
                    {
                        $('.addboletabtn').on('click', function () 
                        {
                            console.log("OK");
                            $('#addmodal').modal('show');
                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function () 
                            {
                                return $(this).text().replace(/\s+/g, " ").trim();
                            }).get();
                            console.log(data);
                            // $('#update_id').val(data[0]);
                            // $('#dni').val(data[1]);
                            // $('#fname').val(data[2]);
                            // $('#lname').val(data[3]);
                            // $('#email').val(data[4]);
                            // // val(5) for password and not editable for admin --- u can only reset the password
                            // $('#user_type_edit').val(data[6])
                            // $('#state_edit').val(data[7])
                        });
                    });
                </script> -->
    <script>

    </script>

    <!-- <input type="text" id='id_persona' style='display:none;'> -->
    <input type="text" id='id_persona' style='display:none;'>

    <!-- ==================INICIO MODAL================= -->
    <button type="button" class="btn btn-secondary" id='ModalAgregarPersona'>
    <i class="bi bi-person-plus"></i> Agregar Persona
    </button>


    <!-- The Modal -->
    <div class="modal m-1 fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-1">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Persona</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>


                <form class="col container p-1">

                    <div class="card">
                    <h5 class="card-header">Persona</h5>
                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-auto">
                                <label for="inputPassword2" class="">Ingrese DNI/Cod Modular</label>
                                <input type="text" name='textDNI' id='textDNI' class="form-control form-control-sm" id="inputPassword2" placeholder="" required>

                                <div class="form-check form-switch" style="position:relative; top:20px; right:-50px;    ">
                                    <input class="form-check-input" type="checkbox" role="switch" id="AddCheck">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Agregar Nueva Persona</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" id='BuscarDNI' class="btn btn-primary mb-3 btn-sm" style ="position: relative; top: 23px;">Buscar</button>
                            </div>

                            <div class="col">
                                <div class="row align-items-start">
                                    <div class="col-auto">
                                        <hr width="1" size="90">
                                    </div>
                                    <div class="col-3">
                                        <label for="inputPassword2" class="">Id</label>
                                        <input type="number" class="form-control form-control-sm" id="inputid" value='' placeholder="" disabled>
                                        <label for="inputPassword2" class="">DNI</label>
                                        <input type="number" class="form-control form-control-sm" id="inputDNI" value='' placeholder="">
                                        <label for="inputPassword2" class="">Codigo Modular</label>
                                        <input type="text" class="form-control form-control-sm" id="inputCodModular" value='' placeholder="">
                                    </div>
                                    <div class="col-6">
                                        <label for="inputPassword2" class="">Apellido Paterno</label>
                                        <input type="text" class="form-control form-control-sm" id="inputAPaterno" value=''>
                                        <label for="inputPassword2" class="">Apellido Materno</label>
                                        <input type="text" class="form-control form-control-sm" id="inputAMaterno" value='' placeholder="">
                                        <label for="inputPassword2" class="">Nombres</label>
                                        <input type="text" class="form-control form-control-sm" id="inputNombres" value='' placeholder="">
                                    </div>
                                    <div class="col">
                                        <label for="inputPassword2" class="">Condición</label>
                                        <select class="form-select form-select-sm" id='inputCondicion' aria-label="Default select example">
                                            <option value="0" selected>Seleccionar...</option>
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="CESANTE">CESANTE</option>
                                        </select>
                                        <!-- GUARDAR NUEVA PERSONA -->
                                        <button type="submit" class="btn btn-success mb-3 btn-sm" id='savepersona' style ="position: relative; top: 23px;"><i class="bi bi-person-check"></i>/<i class="bi bi-person-plus"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                

                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body" style='padding:0px; padding-top:10px;'>
                        

                    </div>

                    <!-- <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    </div>


                </form>



            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Cerrar</button>
            </div>

            </div>
        </div>
    </div>


    <script>
       
        $(document).ready(function(){

            var switchStatus = false;
            $("#AddCheck").on('change', function() {
                if ($(this).is(':checked')) {
                    switchStatus = $(this).is(':checked');
                    document.getElementById("textDNI").value = "";
                    $("#textDNI").attr("disabled", "disabled");
                    $("#BuscarDNI").attr("disabled", "disabled");  
                    // alert(switchStatus);// To verify
                }
                else {
                switchStatus = $(this).is(':checked');
                $("#textDNI").removeAttr("disabled"); 
                $("#BuscarDNI").removeAttr("disabled"); 
                // alert(switchStatus);// To verify
                }
            });

            $('#savepersona').click(function(e)
            {
                e.preventDefault();
                //Si el check no está activado se va a modificar datos de persona
                if (document.getElementById("AddCheck").checked == false)
                {   
                    if ($("#inputid").val() == "")
                    {
                        // alert("Por favor primero realice una busqueda");
                        swal('Error','Por favor seleccione una persona','error');
                    }
                    else
                    {
                        // alert("Se va a modificar los datos");
                        var formData = {
                            input_id_persona: $("#id_persona").val(),
                            input_dni: $("#inputDNI").val(),
                            input_codmodular: $("#inputCodModular").val(),
                            input_apellidoP: $("#inputAPaterno").val(),
                            input_apellidoM: $("#inputAMaterno").val(),
                            input_nombres: $("#inputNombres").val(),
                            input_condicion: $("#inputCondicion").val(),
                        };
                        $.ajax({
                        url: 'ModificarPersona.php',
                        type: 'post',
                        data: formData,
                        success: function(data){ 
                            // Add response in Modal body
                            $('.modal-body').html(data);
                            // Display Modal
                            // $('#modal2').modal('show'); 
                        }
                        });
                    }

                }
                //Si el check está activado se va a agregar una nueva persona
                else
                {
                    alert("Se va a agregar nuevos datos");
                    var formData2 = {
                        input_id_persona: $("#id_persona").val(),
                        input_dni: $("#inputDNI").val(),
                        input_codmodular: $("#inputCodModular").val(),
                        input_apellidoP: $("#inputAPaterno").val(),
                        input_apellidoM: $("#inputAMaterno").val(),
                        input_nombres: $("#inputNombres").val(),
                        input_condicion: $("#inputCondicion").val(),
                    };
                    $.ajax({
                    url: 'AgregarPersona.php',
                    type: 'post',
                    data: formData2,
                    success: function(data){ 
                        // Add response in Modal body
                        $('.modal-body').html(data);
                        // Display Modal
                        // $('#modal2').modal('show'); 
                    }
                    });
                }
            });


            $('#main-searcher').click(function(){
                datos = $('#frmajax').serialize();
                $.ajax({
                    type: "POST",
                    url: "consulta_boleta.php",
                    data: datos,
                    success:function(r){
                        $('#resultado_elegido').html(r)
                        $('.select').on('click', function(){
                            $tr = $(this).closest('tr');
                            var data = $tr.children("td").map(function(){
                                return $(this).text().replace(/\s+/g, " ").trim();
                            }).get();
                            $('#codMod').val(data[0])
                            $('#nombres').val(data[1])
                            $('#condicion').val(data[2])
                        });
                    }
                });
                return false;
            });


            $("#buttonmodal2").click(function(e)
            {

                e.preventDefault();
                $("#myModal2").modal('show');

                // AJAX request
                $.ajax({
                url: 'buscar.php',
                type: 'post',
                data: {orderid: orderid},
                success: function(data){ 
                    // Add response in Modal body
                    $('.modal-body-2').html(data);
                    // Display Modal
                    $('#modal2').modal('show'); 
                }
                });
                });

            
            $("#ModalAgregarPersona").click(function(e)
            {
                
                $("#myModal").modal('show');
                e.preventDefault();
                $("#BuscarDNI").click(function(e)
                {
                    alert('Ingresó a buscar DNI');
                    e.preventDefault();
                    var formData = {
                        dni: $("#textDNI").val(),
                    };
                    $.ajax({
                    url: 'buscarDNI.php',
                    type: 'post',
                    data: formData,
                    success: function(data){ 
                        // Add response in Modal body
                        $('.modal-body').html(data);
                        // Display Modal
                        // $('#modal2').modal('show'); 

                    }
                    });

                });
                // AJAX request
            });

            });

    </script>



    <!-- ==================INICIO MODAL2================= -->
    <button type="button" class="btn btn-secondary" id='buttonmodal2'>
    <i class="bi bi-card-list"></i> Agregar Boleta
    </button>


    <!-- The Modal -->
    <div class="modal m-1 fade" id="myModal2">
        <div class="modal-dialog modal-xl">
            <div class="modal-content p-1">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Boleta</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>


                <form class="col container border rounded p-1">

                    <div class="card">
                                <h5 class="card-header">Persona</h5>

                    <div class="card-body">
                        <div class="row align-items-start">
                            <div class="col-auto">
                                <label for="inputPassword2" class="">Ingrese DNI/Cod Modular</label>
                                <input type="text" class="form-control form-control-sm" id="tb-buscador" placeholder="">

                                <div class="form-check form-switch" style="position:relative; top:20px; right:-50px;    ">
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Agregar Nueva Persona</label>
                                </div>
                                <button class="btn btn-primary mb-3 btn-sm" style ="position: relative; top: 23px;">Buscar</button>
                            </div>

                

                <!-- <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Estado
                        </div>
                        <div class="card-body">
                        <label for="inputPassword2" class="">Nombres</label>
                            <input type="text" class="form-control form-control-sm" id="inputPassword2" placeholder="">
                        </div>
                    </div>
                </div> -->

                    </div>
                    <hr>



                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>


                </form>

            <!-- Modal body -->
            <div class="modal-body-2">
                
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

            </div>
        </div>
    </div>




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

                <div class='border' name='resultado_elegido' id='resultado_elegido'>
                            
                </div>
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