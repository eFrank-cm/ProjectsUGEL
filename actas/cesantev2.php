<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo Cesante</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        
        <style>
                table.table td a.edit {
                color: #FFC107;
                }
                table.table td a.delete {
                color: #E34724;
                }
                table.table td i {
                font-size: 19px;
                }

        </style>
    </head>
    <body>
        <div class='container border '>
            <div class='m-5 row justify-content-center'>
                <!-- panel preview 1 -->
                <div class="col-md-5 mb-3">
                    <div class="card mb-5">
                        
                        <div class="card-header py-3">
                            <h5 class="mb-0">Datos del Usuario del Docente Cesante</h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <!-- Codigo Modular 1 -->  
                                <div class="input-group input-group-sm mb-4">
                                    <span class="input-group-text">Codigo Modular</span>
                                    <div class='col-sm-6' style="width: 50.5%">
                                        <input type='text' class='form-control' maxlength='12' id='Modular' name='Modular'>
                                    </div>
                                </div>
                                <!-- Nombres -->  
                                <div class="input-group input-group-sm mb-4">
                                    <span class="input-group-text">Nombres</span>
                                    <div class='col-sm-7' style="width: 62.7%">
                                        <input type='text' class='form-control' maxlength='50' id='Modular' name='Modular'>
                                    </div>
                                </div>

                                <!-- Apellido Paterno -->  
                                <div class="input-group input-group-sm mb-4">
                                    <span class="input-group-text">Apellido Paterno</span>
                                    <div class='col-sm-6' style="width:50.4%">
                                        <input type='text' class='form-control' maxlength='50' id='Modular' name='Modular'>
                                    </div>
                                </div>
                        
                                <!-- Apellido Materno --> 
                                <div class="input-group input-group-sm mb-4">
                                    <span class="input-group-text">Apellido Materno</span>
                                    <div class='col-sm-6' style="width: 49.5%">
                                        <input type='text' class='form-control' maxlength='50' id='Modular' name='Modular'>
                                    </div>
                                </div>
                                <!-- Fecha --> 
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group">
                                        <label class="input-group-text" for="inputGroupSelect01">Fecha</label>
                                        <div class='col-sm-6'style="width: 36.9%">
                                            <select class="form-select" id="inputGroupSelect01">
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
                                        <div class='col-sm-7'style="width: 29.5%">
                                            <select class="form-select" id="inputGroupSelect01">
                                                <?php
                                                    for($i=date('o'); $i>=1950; $i--){
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
                                <!-- Condicion --> 
                                <div class="input-group input-group-sm mb-4">
                                    <div class='col-sm-10'>
                                        <input class="form-control form-control-sm" id="formFileSm" type="file">
                                    </div>
                                </div>
                                 <!-- Boton buscar --> 
                                <div class="input-group input-group-sm mb-4">
                                    <div class="input-group justify-content-center ">
                                        <button type="button" class="btn btn-outline-secondary">Buscar</button>
                                    </div>
                                </div>
                                 <!-- Boton Editar --> 
                            </form>
                        </div>  
                    </div>
                </div>
                <!-- panel preview 2 -->

                <div class="card mb-2">
                        <div class="row">
                            <div class="col mt-md-3"><h2>Recibidor pagador</h2></div>
                                <div class = "col mt-md-3">
                                    <div class="input-group justify-content-end">
                                        <button type="button" class="btn btn-primary">
                                            <i class="bi bi-plus">Agregar</i>
                                        </button>
                                    </div>
                                </div>
                        </div> 
                        <table class="table table-light  table-bordered">
                            <thead>
                                <tr>
                                <th>
                                    <div class="input-group justify-content-center ">
                                        codigo
                                    </div>
                                </th>
                                <th>
                                    <div class="input-group justify-content-center ">
                                        Nombre de codigo
                                    </div>
                                </th>
                                <th>
                                    <div class="input-group justify-content-center ">
                                        Monto S/.
                                    </div>
                                </th>
                                <th>
                                    <div class="input-group justify-content-center ">
                                       Opciones
                                    </div>
                                </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-8'style="width: 67.499999995%">
                                                <select class="form-select " id="inputGroupSelect01">
                                                        <?php
                                                            for($i=100; $i>=-100; $i--){
                                                                if ($i == 0 )
                                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                                else
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                                            </div>
                                        </div>
                                    </td>   
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">S/.</span>
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <th>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-8'style="width: 67.499999995%">
                                                <select class="form-select " id="inputGroupSelect01">
                                                        <?php
                                                            for($i=100; $i>=-100; $i--){
                                                                if ($i == 0 )
                                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                                else
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                                            </div>
                                        </div>
                                    </td>   
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">S/.</span>
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                <th>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-8'style="width: 67.499999995%">
                                                <select class="form-select " id="inputGroupSelect01">
                                                        <?php
                                                            for($i=100; $i>=-100; $i--){
                                                                if ($i == 0 )
                                                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                                                else
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                }
                                                        ?>
                                                    </select>
                                            </div>
                                        </div>
                                    </th>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                                            </div>
                                        </div>
                                    </td>   
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <div class='col-sm-7'style="width: 47.499999995%">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">S/.</span>
                                                    <input type="number" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div  class="input-group justify-content-center">
                                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class = "col-md-12 alert alert-secondary">
                                <div class="input-group justify-content-center">
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-plus">Guardar</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                                                                        
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div  class="input-group justify-content-center">
                                    <div class='col-sm-8'>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Rem. Total</label>
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div  class="input-group justify-content-center">
                                    <div class='col-sm-9'>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">T. Descuentos</label>
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div  class="input-group justify-content-center">
                                    <div class='col-sm-9'>
                                        <div class="input-group mb-4">
                                            <label class="input-group-text" for="inputGroupSelect01">Rem Liquida.</label>
                                            <input type="number" class="form-control">
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