$(document).ready(function(){
    // ELEGIR BOLETA
    $('#div-bol').on('click', '.editbtn', function(){
        console.log("OK");
        $('#editBmodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() 
        {
            return $(this).text().replace(/\s+/g, " ").trim();
        }).get();
        console.log(data);

        dataTmp = data
        dataBol = {'n':dataTmp[0], 'fecha':dataTmp[1], 'codPlanilla':dataTmp[2], 'anulado':dataTmp[3]}
        dataBoleta(dataBol, 'edit');

    });

    // NEW BOLETA
    $('#btn-add-bol').on('click', function(){
        $('#newBmodal').modal('show');
        datosBoleta = {'n':'', 'fecha':'', 'codPlanilla':'', 'anulado':''};
        console.log(datosBoleta);
        dataBoleta(datosBoleta, 'new');

    });

    // BUTTON - ADD BOLETA
    $('.modal-body-2').on('click', '#save-bol', function(){
        dataBol = getDataFormJSON('#frm-data-bol');
        
        if(dataBol['n']!=''){
            dataBol['accion'] = 'update';
            console.log('update');
        }
        console.log(dataBol);
        $.ajax({
            type: 'POST',
            url: '../../Items/add.php',
            data: dataBol,
            success: function(res){
                bol = JSON.parse(res);
                console.log(bol);
                $('#n-data-bol').val(bol['n']);
                $('.add-monto').prop('disabled', false)
                $('#delbtn-bol').prop('disabled', false);

                da = {'idp':$('#bol-idp-shw').val()};
                $.ajax({
                    type: 'post',
                    url: '../../Items/search.php',
                    data: da,
                    success: function(res){
                        $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                        $('#div-bol').html(res);
                    }
                }); 
            }
        })
        return false;
    });

    // BUTTON - DEL BOLETA
    $('.modal-body-2').on('click', '#delbtn-bol', function(){
        n = $('#n-data-bol').val();
        fecha = $('#fecha-data-bol').val();
        codPlanilla = $('#codPlanilla-data-bol').val();
        DatosBoleta = { 'n':n, 'fecha': fecha, 'codPlanilla': codPlanilla,  idp: '--', 'accion': 'del'};
        respuesta = confirm('se eliminara la boleta Nro ' + DatosBoleta['n']);
        if (respuesta){
            $.ajax({
                type: 'post',
                url: '../../Items/add.php',
                data: DatosBoleta,
                success: function(res){
                    console.log(res);

                    da = {'idp':$('#bol-idp-shw').val()};
                    $.ajax({
                        type: 'post',
                        url: '../../Items/search.php',
                        data: da,
                        success: function(res){
                            $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                            $('#div-bol').html(res);
                            $('#editBmodal').modal('hide');
                        }
                    });
                }
            });
        }
        return false;
    })


    // BUTTON - ADD MONTO
    $('.modal-body-2').on('click', '.add-monto', function(){
        dataTmp = getDataRow(this);
        dataMonto = {'cod': dataTmp[1], 'monto': dataTmp[2], 'n': $('#n-data-bol').val(), 'accion': 'add'};
        console.log(dataMonto);
        $.ajax({
            type: 'post',
            url: '../../Items/add.php',
            data: dataMonto,
            success: function(res){
                datos = JSON.parse(res);
                rowCount = document.getElementById('tb-montos').rows.length;
                n = 1;
                if(rowCount > 2){
                    n = 2;
                }
                tabla = document.getElementById('tb-montos').insertRow(n);
            
                col1 = tabla.insertCell(0);
                col2 = tabla.insertCell(1);
                col3 = tabla.insertCell(2);
                col4 = tabla.insertCell(3);
                col1.innerHTML = datos['idm'];

                col2.innerHTML = datos['cod'];
                col2.setAttribute('contenteditable', 'true')

                col3.innerHTML = datos['monto'];
                col3.setAttribute('contenteditable', 'true')

                col4.innerHTML = "<button class='update-monto  btn btn-outline-success btn-sm'><i class='bi bi-pencil-square'></i> editar</button>"
                col4.innerHTML += "   " 
                col4.innerHTML += "<button class='del-monto btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i> Eliminar</button>"  

                $('#tb-montos .td-monto').empty();
                $('#tb-montos #add-cod-monto').focus();

                // ACTUALIZAR TABLA DE MONTOS
                // dataBol = {'n':$('#n-data-bol').val(), 'fecha': $('#fecha-data-bol').val(), 'codPlanilla':$('#codPlanilla-data-bol').val(), 'anulado':''}
                // dataBoleta(dataBol);
            }
        });

        return false;
    });

    // BUTTON - DELETE MONTO
    $('.modal-body-2').on('click', '.del-monto', function(){
        dataRow = getDataRow(this);
        console.log(dataRow);
        dataDel = {'idm': dataRow[0], 'cod':dataRow[1], 'monto': dataRow[2], 'n':$('#n-data-bol').val(), 'accion': 'del'};
        
        respuesta = confirm('Eliminar monto: ' + dataDel['cod']  + ' y ' + dataDel['monto']);
        if (respuesta){
            $.ajax({
                type:'post',
                url: '../../Items/add.php',
                data: dataDel,
                success: function(res){
                    
                    console.log(res);
                }
            });
        }
        $(this).closest('tr').remove();
    });

    // BUTTON - EDIT MONTO
    $('.modal-body-2').on('click', '.update-monto', function(){
        dataRow = getDataRow(this);
        dataMonto = {'idm': dataRow[0], 'cod': dataRow[1], 'monto': dataRow[2], 'n':$('#n-data-bol').val(), 'accion': 'update'};
        console.log(dataMonto);
        $.ajax({
            type: 'post',
            url: '../../Items/add.php',
            data: dataMonto,
            success: function(res){
                console.log(res);
            }
        });

        console.log(dataMonto);
        return false;
    });

    function getDataFormJSON(idForm){
        dataObj = {};
        $($(idForm).serializeArray()).each(function(_, field){
            dataObj[field.name] = field.value;
        });
        return dataObj
    }
    
    function dataBoleta(datosBoleta, tipo){
        tipo = '#editBoleta';
        if(tipo == 'new'){
            tipo = '#newBoleta'
        }
        console.log(tipo)
        $.ajax({
            type: "POST", 
            url: "../../items/search.php",
            data: datosBoleta,
            success: function(data){
                $(tipo).html(data);
                $('#bol-idp-shw').val($('#idp-shw').val());
                $('#idp-data-bol').val($('#idp-shw').val());
                $('#bol-codMod-shw').val($('#codMod-shw').val());
                $('#bol-nombres-shw').val($('#apPaterno-shw').val() + ' ' +  $('#apMaterno-shw').val() + ' ' + $('#nombres-shw').val());
                $('#bol-condicion-shw').val($('#condicion-shw').val());
    
                console.log(datosBoleta);
                if(datosBoleta['fecha']!=''){
                    $('.add-monto').prop('disabled', false);
                    $('#delbtn-bol').prop('disabled', false);
                }
            } 
        });
    }
    
    function getDataRow(obj){
        $tr = $(obj).closest('tr');
        data = $tr.children("td").map(function(){
            return $(this).text().replace(/\s+/g, " ").trim();
        }).get();
        return data
    }


});



