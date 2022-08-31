$(document).ready(function(){
    // RADIO - SELECT PERSONA
    $('.rd-select').on('change', function(){
        boolAdd = true; boolSearch = false;
        if($(this).val()=='add'){
            boolAdd = false; boolSearch =true;
        }

        // SEARCH
        $('#kw-srch').prop('disabled', boolSearch);
        $('#btn-srch-per').prop('disabled', boolSearch);
        $('.select').prop('disabled', boolSearch);
        
        // ADD
        $('#codMod-add').prop('disabled', boolAdd);
        $('#nombres-add').prop('disabled', boolAdd);
        $('#condicion-add').prop('disabled', boolAdd);
        $('#btn-add-per').prop('disabled', boolAdd);
    });

    // BUTTON - SEARCH PERSONA
    $('#btn-srch-per').click(function(e){
        if($('#kw-srch').val().length != 0){
            datos = getDataFormJSON('#frm-srch-per');
            e.preventdefault;
            $.ajax({
                type: "POST",
                url: "search.php",
                data: datos,
                success:function(r){
                    $('#res-srch-per').html(r)

                    // BUTTON - SELECT PERSONA
                    $('.select').on('click', function(){
                        data = getDataRow(this)
                        $('#idp-shw').val(data[0])
                        $('#codMod-shw').val(data[1])
                        $('#nombres-shw').val(data[2])
                        $('#condicion-shw').val(data[3])

                        $.ajax({
                            type: 'POST',
                            url: 'search.php',
                            data: {'idp': data[0]},
                            success: function(res){
                                $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                                $('#div-bol').html(res);
                                $('#data-bol').html('');
                            }
                        });
                    });
                }
            });    
        }
        return false;
    });

    // BUTTON - ADD PERSONA
    $('#btn-add-per').click(function(){
        dataFrm = getDataFormJSON('#frm-add-per');
        $.ajax({
            type: 'POST',
            url: 'add.php',
            data: dataFrm,
            success: function(r){
                persona = JSON.parse(r);
                alert(persona['mensaje']);
                $('#codMod-add').val('');
                $('#nombres-add').val('');
                $('#condicion-add').val('');

                // SELECT PERSONA
                $('#idp-shw').val(persona['idp']);
                $('#codMod-shw').val(persona['codMod']);
                $('#nombres-shw').val(persona['nombres']);
                $('#condicion-shw').val(persona['condicion']);

                $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                $('#div-bol').html('');
                $('#data-bol').html('');
            }
        })
        return false;
    });

    // BUTTON - NEW BOLETA
    $('#div-btn-add-bol').on('click', '#btn-add-bol', function(){
        datosBol = {'n':'', 'fecha':'', 'codPlanilla':'', 'anulado':''}
        dataBoleta(datosBol);
    });

    // BUTTON - SELECT BOLETA
    $('#div-btn-add-bol').on('click', '.editbtn', function(){
        dataTmp = getDataRow(this);
        dataBol = {'n':dataTmp[0], 'fecha':dataTmp[1], 'codPlanilla':dataTmp[2], 'anulado':dataTmp[3]}
        dataBoleta(dataBol);
    })

    // BUTTON - ADD BOLETA
    $('#data-bol').on('click', '#save-bol', function(){
        dataBol = getDataFormJSON('#frm-data-bol');
        if(dataBol['n']!=''){
            dataBol['accion'] = 'update';
            console.log('update');
        }
        console.log(dataBol);
        $.ajax({
            type: 'POST',
            url: 'add.php',
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
                    url: 'search.php',
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
    $('#data-bol').on('click', '#delbtn-bol', function(){
        n = $('#n-data-bol').val();
        fecha = $('#fecha-data-bol').val();
        codPlanilla = $('#codPlanilla-data-bol').val();
        DatosBoleta = { 'n':n, 'fecha': fecha, 'codPlanilla': codPlanilla,  idp: '--', 'accion': 'del'};
        respuesta = confirm('se eliminara la boleta Nro ' + DatosBoleta['n']);
        if (respuesta){
            $.ajax({
                type: 'post',
                url: 'add.php',
                data: DatosBoleta,
                success: function(res){
                    console.log(res);

                    da = {'idp':$('#bol-idp-shw').val()};
                    $.ajax({
                        type: 'post',
                        url: 'search.php',
                        data: da,
                        success: function(res){
                            $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                            $('#div-bol').html(res);
                            $('#data-bol').html('');
                        }
                    });
                }
            });


            
        }
        return false;
    })

    // BUTTON - ADD MONTO
    $('#data-bol').on('click', '.add-monto', function(){
        dataTmp = getDataRow(this);
        dataMonto = {'cod': dataTmp[1], 'monto': dataTmp[2], 'n': $('#n-data-bol').val(), 'accion': 'add'};
        console.log(dataMonto);

        $.ajax({
            type: 'post',
            url: 'add.php',
            data: dataMonto,
            success: function(res){
                datos = JSON.parse(res);
                rowCount = document.getElementById('tb-montos').rows.length;
                n = 1;
                if(rowCount > 2){
                    n = rowCount - 1;
                }
                tabla = document.getElementById('tb-montos').insertRow(n);
            
                col1 = tabla.insertCell(0)
                col2 = tabla.insertCell(1);
                col3 = tabla.insertCell(2);
                col4 = tabla.insertCell(3);
                col1.innerHTML = datos['idm'];

                col2.innerHTML = datos['cod'];
                col2.setAttribute('contenteditable', 'true')

                col3.innerHTML = datos['monto'];
                col3.setAttribute('contenteditable', 'true')

                col4.innerHTML = "<button class='del-monto'>Eliminar</button>  <button class='update-monto'>editar</button>"

                $('#tb-montos .td-monto').empty();
                $('#tb-montos #add-cod-monto').focus();
            }
        });
        return false;
    });

    // BUTTON - DELETE MONTO
    $('#data-bol').on('click', '.del-monto', function(){
        dataRow = getDataRow(this);
        console.log(dataRow);
        dataDel = {'idm': dataRow[0], 'cod':dataRow[1], 'monto': dataRow[2], 'n':$('#n-data-bol').val(), 'accion': 'del'};
        $.ajax({
            type:'post',
            url: 'add.php',
            data: dataDel,
            success: function(res){
                alert(res);
            }
        });

        $(this).closest('tr').remove();
    });

    // BUTTON - EDIT MONTO
    $('#data-bol').on('click', '.update-monto', function(){
        dataRow = getDataRow(this);
        dataMonto = {'idm': dataRow[0], 'cod': dataRow[1], 'monto': dataRow[2], 'n':$('#n-data-bol').val(), 'accion': 'update'};
        $.ajax({
            type: 'post',
            url: 'add.php',
            data: dataMonto,
            success: function(res){
                console.log(res);
            }
        });
        console.log(dataMonto);
    });
});

function getDataFormJSON(idForm){
    dataObj = {};
    $($(idForm).serializeArray()).each(function(_, field){
        dataObj[field.name] = field.value;
    });
    return dataObj
}

function dataBoleta(datosBoleta){
    $.ajax({
        type: "POST", 
        url: "search.php",
        data: datosBoleta,
        success: function(data){
            $('#data-bol').html(data);
            $('#bol-idp-shw').val($('#idp-shw').val());
            $('#idp-data-bol').val($('#idp-shw').val());
            $('#bol-codMod-shw').val($('#codMod-shw').val());
            $('#bol-nombres-shw').val($('#nombres-shw').val());
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









