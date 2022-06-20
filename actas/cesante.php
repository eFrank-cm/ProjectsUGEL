<!doctype html>
<html lang="es">
    <head>
        <title>Actas y Pagos</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
        <link href='//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
        <script src='//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js'></script>
        <script src='//code.jquery.com/jquery-1.11.1.min.js'></script>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Sistema V2</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="ruta.php"><a href="#">Inicio</a></li>
                    <li><a href="sistemav2.php">ACTIVO</a></li>
                    <li><a href="cesante.php">CESANTE</a></li>
                </ul>
            </div>
        </nav>
    </head>
    <body>
        
        <div class='container'>
            <div class='row'>
                <!-- panel preview -->
                <div class='col-sm-5'>
                    <h4>DATOS DEL USUARIO DEL CESANTE:</h4>
                    <div class='panel panel-default'>
                        <div class='panel-body form-horizontal payment-form'>
                            <div class='form-group'>
                                <label for='Modular' class='col-sm-3 control-label'>Codigo Modular N°</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' maxlength='12' id='Modular' name='Modular'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='Nombres' class='col-sm-3 control-label'>Nombres</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' id='Nombres' name='Nombres'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='ApellidoPA' class='col-sm-3 control-label'>Apellido Paterno</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' id='ApellidoPA' name='ApellidoPA'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='ApellidoMA' class='col-sm-3 control-label'>Apellido Materno</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' id='ApellidoMA' name='ApellidoMA'>
                                </div>
                            </div>
                            <div class='form-group'>
                                <label for='Planilla' class='col-sm-3 control-label'>Codigo Planilla N°</label>
                                <div class='col-sm-8'>
                                    <input type='text' class='form-control' maxlength='12' id='Planilla' name='Planilla'>
                                </div>
                            </div>
        
                            <div class='form-group'>
                                <label for='Codicion' class='col-sm-3 control-label' >Codicion</label>
                                <div class='col-sm-8 '>
                                    <select class='form-control' id='status' name='status'>
                                        <option>Cesante</option>
                                        <option>Activo</option>
                                    </select>
                                </div>
                            </div> 
                            <div class='form-group'>
                                <label for='date' class='col-sm-3 control-label'>Fecha</label>
                                <div class='col-sm-8' >
                                    <div class="row">
                                        <div class="col-xs-7">
                                        <select class="form-control col-sm-5" name="expiry-month" id="expiry-month">
                                            <option>Meses</option>
                                            <option value="01">enero</option>
                                            <option value="02">febrero</option>
                                            <option value="03">marzo</option>
                                            <option value="04">abril</option>
                                            <option value="05">mayo</option>
                                            <option value="06">junio</option>
                                            <option value="07">julio</option>
                                            <option value="08">agosto</option>
                                            <option value="09">septiembre</option>
                                            <option value="10">octubre</option>
                                            <option value="11">noviembre</option>
                                            <option value="12">diciembre</option>
                                        </select>
                                        </div>
                                        <div class="col-xs-5">
                                            <select  class="form-control col-sm-5" name="expiry-year" id="expiry-year">
                                                <?php
                                                    for($i=date('o'); $i>=1910; $i--){
                                                        if ($i == date('o'))
                                                            echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                        else
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            <div class='form-group'>
                                <div class='col-sm-12 text-right'>
                                    <button type='button' class='btn btn-success'>Buscar</button>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div> <!-- / panel preview -->
                <div class='col-sm-7'>
                    <h4>RECIBIDOR PAGADOR:</h4>
                    <div class='row'>
                        <div class='box_header'>
                            <div class='col-md-12 mybox1'>
                                <div class='box-container bbr'>
                                    <div class='gv'>
                                        <table width='100%' border='0' class='myGridClass' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td width='5%' height='33' align='center'><strong>Codigo</strong></td>
                                                <td width='18%' align='center'><strong>Nombre del Codigo</strong></td>
                                                <td width='18%' align='center'><strong>Monto s/.</strong></td>
                                            </tr>
                                            <tr>
                                                <td height='33' align='center'>
                                                    <select class='form-control' id='status' name='status'>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </td>
                                                <td align='center'>
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <input type='text' class='form-control' maxlength='10' id='Ingreso' name='Ingreso'>
                                                    </div>
                                                </td>
                                                <td  align='center'>
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <input type='text' class='form-control' maxlength='10' id='Monto' name='Monto'>
                                                    </div>
                                                </td>
                                            </tr>
                
                                        </table>
                                        <div class='container'>
                                            <div class='row'>
                                                <h4>Total: <strong><span class='text-bottom'></span></strong></h4>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row ">
                                                <strong><span class="align-baseline">Total 1:.......................</span></strong>
                                                <strong><span class="align-middle">total 2:.........................</span></strong>
                                                <strong><span class="align-text-top">total 3:.......................</span></strong>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-xs-3'>
                                                <hr style='border:1px dashed #dddddd;'>
                                                <button type='button' class='btn btn-danger btn-block'>Imprimir</button>
                                            </div>                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>