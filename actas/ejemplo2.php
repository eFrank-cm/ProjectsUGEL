<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            <style>
                body {
                color: #566787;
                background: #f5f5f5;
                font-family: 'Roboto', sans-serif;
                }
                .table-responsive {
                margin: 30px 0;
                }
                .table-wrapper {
                min-width: 1000px;
                background: #fff;
                padding: 20px;
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
                }
                
                .search-box {
                position: relative;
                float: style;
                }
                .search-box input {
                height: 34px;
                border-radius: 20px;
                padding-left: 35px;
                border-color: #ddd;
                box-shadow: none;
                }
                .search-box input:focus {
                border-color: #3FBAE4;
                }
                .search-box i {
                color: #a0a5b1;
                position: absolute;
                font-size: 19px;
                top: 8px;
                left: 10px;
                }
              
                table.table tr th, table.table tr td {
                border-color: #e9e9e9;
                }
                table.table-striped tbody tr:nth-of-type(odd) {
                background-color: #fcfcfc;
                }
                table.table-striped.table-hover tbody tr:hover {
                background: #f5f5f5;
                }
                table.table th i {
                font-size: 13px;
                margin: 0 5px;
                cursor: pointer;
                }
                table.table td:last-child {
                width: 130px;
                }
                table.table td a {
                color: #a0a5b1;
                display: inline-block;
                margin: 0 5px;
                }
                table.table td a.view {
                color: #03A9F4;
                }
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
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class = "combox">
                                    <select id="input_sex" class="form-control">
                                        <option value="Mr.">Codigo Modular</option>
                                        <option value="Ms.">Ms.</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Codigo modular</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Codigo Planilla</th>
                                    <th>Condicion</th>
                                    <th>Mes</th>
                                    <th>Año</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456789</td>
                                    <td>Cesar Rodrigo</td>
                                    <td>Ttito</td>
                                    <td>Quilca</td>
                                    <td>AT97219</td>
                                    <td>Cesante</td>
                                    <td>Agosto</td>
                                    <td>1998</td>
                                    <td>
                                        <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>123456789</td>
                                    <td>Cesar Rodrigo</td>
                                    <td>Ttito</td>
                                    <td>Quilca</td>
                                    <td>AT97219</td>
                                    <td>Cesante</td>
                                    <td>Agosto</td>
                                    <td>1998</td>
                                    <td>
                                        <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                <td>123456789</td>
                                    <td>Cesar Rodrigo</td>
                                    <td>Ttito</td>
                                    <td>Quilca</td>
                                    <td>AT97219</td>
                                    <td>Cesante</td>
                                    <td>Agosto</td>
                                    <td>1998</td>
                                    <td>
                                        <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                        <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 