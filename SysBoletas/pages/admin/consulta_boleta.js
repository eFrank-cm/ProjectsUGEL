$(document).ready(function(){
    // BUTTON -  AGREGAR / EDITAR PERSONA
    $('#savepersona').click(function(e){
        e.preventDefault();
        var personData = {
            'idp': $("#id_persona").val(),
            'dni': $("#inputDNI").val(),
            'codMod': $("#inputCodModular").val(),
            'apPaterno': $("#inputAPaterno").val(),
            'apMaterno': $("#inputAMaterno").val(),
            'nombres': $("#inputNombres").val(),
            'condicion': $("#inputCondicion").val(),
        };
        //Si el check no está activado se va a modificar datos de persona
        if (document.getElementById("AddCheck").checked === false)
        {   
            if ($("#inputid").val() === ""){
                // alert("Por favor primero realice una busqueda");
                swal('Error','Por favor seleccione una persona','error');
            }
            else{
                // alert("Se va a modificar los datos");
                $.ajax({
                    url: '../../Items/add.php',
                    type: 'post',
                    data: personData,
                    success: function(data){ 
                        swal({
                            text: 'Datos modificados exitosamente!',
                            icon: 'success'
                        });
                    }
                });

                document.getElementById("inputid").value = "";
                $('.modal-body').html('');
                document.getElementById("inputDNI").value = "";
                document.getElementById("inputCodModular").value = "";
                document.getElementById("inputAPaterno").value = "";
                document.getElementById("inputAMaterno").value = "";
                document.getElementById("inputNombres").value = "";
                document.getElementById("inputCondicion").value = "0";
                document.getElementById("AddCheck").checked = true;
            }

        }
        //Si el check está activado se va a agregar una nueva persona
        else{
            $.ajax({
                url: '../../Items/add.php',
                type: 'post',
                data: personData,
                success: function(res){ 
                    swal({
                        text: 'Datos añadidos exitosamente!',
                        icon: 'success'
                    });
                }
            });

            document.getElementById("inputDNI").value = "";
            document.getElementById("inputCodModular").value = "";
            document.getElementById("inputAPaterno").value = "";
            document.getElementById("inputAMaterno").value = "";
            document.getElementById("inputNombres").value = "";
            document.getElementById("inputCondicion").value = "0";
            document.getElementById("AddCheck").checked = true;
        }
    });

    // SWITCH - AGREGAR PERSONA
    var switchStatus = false;
    $("#AddCheck").on('change', function() {
        if ($(this).is(':checked')) {
            switchStatus = $(this).is(':checked');
            document.getElementById("textDNI").value = "";
            $("#textDNI").attr("disabled", "disabled");
            $("#BuscarDNI").attr("disabled", "disabled");
            
            // limpiar campos
            $('#id_persona').val('');
            $('#inputid').val('');
            $('#inputDNI').val('');
            $('#inputCodModular').val('');
            $('#inputAPaterno').val('');
            $('#inputAMaterno').val('');
            $('#inputNombres').val('');
            $('#inputCondicion').val('');
            
            // habilitar edicion
            $('#inputDNI').removeAttr("disabled"); 
            $('#inputCodModular').removeAttr("disabled"); 
            $('#inputAPaterno').removeAttr("disabled"); 
            $('#inputAMaterno').removeAttr("disabled"); 
            $('#inputNombres').removeAttr("disabled"); 
            $('#inputCondicion').removeAttr("disabled"); 
            $('#savepersona').removeAttr("disabled"); 
        }
        else {
            switchStatus = $(this).is(':checked');
            $("#textDNI").removeAttr("disabled"); 
            $("#BuscarDNI").removeAttr("disabled");
            
            // deshabilitar edicion de campos 
            $('#inputDNI').attr("disabled", "disabled");
            $('#inputCodModular').attr("disabled", "disabled");
            $('#inputAPaterno').attr("disabled", "disabled");
            $('#inputAMaterno').attr("disabled", "disabled");
            $('#inputNombres').attr("disabled", "disabled");
            $('#inputCondicion').attr("disabled", "disabled");
            $('#savepersona').attr("disabled", "disabled");
        }
    });

    // ELEGIR BOLETA
    $('#resultado_elegido').on('click', '.editbtn', function(){
        $('#modalBoleta').modal('show');
        $('#modaltitle').text(" Editar Boleta");
        dataTmp = getDataRow(this)
        dataBol = {'n':dataTmp[0], 'fecha':dataTmp[1], 'lugar':dataTmp[2] ,'codPlanilla':dataTmp[3], 'anulado':dataTmp[4]}
        dataBoleta(dataBol);
    });

    // VER BOLETA
    $('#resultado_elegido').on('click', '.verbtn-bol', function(){
        dtRow = getDataRow(this);
        dataBol = {
            'codMod': $('#codMod-shw').val(),
            'nombres': $('#apPaterno-shw').val() + ' ' + $('#apMaterno-shw').val() + ' ' + $('#nombres-shw').val(),
            'condicion': $('#condicion-shw').val(),
            'n' : dtRow[0],
            'fecha': dtRow[1],
            'lugar': dtRow[2],
            'codPlanilla': dtRow[3],
            'anulado': dtRow[4]
        };
        console.log(dataBol);
        const form = document.createElement('form');
        form.method = 'post';
        form.action = 'ver_boleta.php';
        form.target = '_blank'

        for(const key in dataBol){
            if(dataBol.hasOwnProperty(key)){
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = key;
                hiddenField.value = dataBol[key];

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    });

    // NEW BOLETA
    $('#resultado_elegido').on('click', '#btn-add-bol', function(){
        $('#modalBoleta').modal('show');
        $('#modaltitle').text(" Nueva Boleta");
        var datosBoleta = {'n':'', 'fecha':'', 'lugar':'', 'codPlanilla':'', 'anulado':''};
        dataBoleta(datosBoleta);
    });

    // BUTTON - ADD BOLETA
    $('.modal-body-2').on('click', '#save-bol', function(){
        var dataBol = getDataFormJSON('#frm-data-bol');
        
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
                var resultado = $.trim(res);
                console.log(resultado);
                if(resultado == "ERROR"){
                    swal('ERROR!', 'No se pudo guardar por que existen campos vacios', 'error');
                }
                else{
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
                            // $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                            $('#div-bol').html(res);
                            $('#frm-monto').removeAttr("hidden");
                            swal('EXITO!', 'Se guardaron los cambios de la boleta!', 'success');
                        }
                    }); 
                }
            }
        })
        return false;
    });

    // BUTTON - DEL BOLETA
    $('.modal-body-2').on('click', '#delbtn-bol', function(){
        var n = $('#n-data-bol').val();
        var fecha = $('#fecha-data-bol').val();
        var codPlanilla = $('#codPlanilla-data-bol').val();
        var lugar = $('#lugar-data-bol').val();
        var DatosBoleta = { 'n':n, 'fecha': fecha, 'lugar': lugar, 'codPlanilla': codPlanilla,  idp: '--', 'accion': 'del'};
        swal({
            title: "Estas seguro de eliminar esta boleta?",
            text: 'Se eliminará la boleta n° ' + DatosBoleta['n']+' y todos los montos que contenga',
            icon: "warning",
            buttons: ["Cancelar","Eliminar"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete){
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
                                // $('#div-btn').html("<button class='btn' id='btn-add-bol' type='button'>Agregar Boleta</button>");
                                $('#div-bol').html(res);
                                $('#modalBoleta').modal('hide');
                            }
                        });
                    }
                });
                swal({
                    title: 'La boleta n° ' + DatosBoleta['n']  + ' ha sido eliminada!',
                    icon: 'success'
                })
            }
        });

        return false;
    })


    // BUTTON - ADD MONTO
    $('.modal-body-2').on('click', '.add-monto', function(){
        // var dataTmp = getDataRow(this);
        //var tipo = $('#cmb-tag').val().split(' ')[0]=='+'?"ingreso":"egreso";
        var tipo =$('[name="cmb-tag2"]').val().split(' ')[0]=='+'?"ingreso":"egreso";
        //var tag = $('#cmb-tag').val().split(' ')[1]
        var tag = $('[name="cmb-tag2"]').val().split(' ')[1]
        var dataToPost = {'tipo': tipo, 'tag':tag, 'monto': $('#inptmonto').val(), 'n': $('#n-data-bol').val(), 'accion': 'add'};
        var Decim = dataToPost['monto'].split('.').length > 1? true: false; 
        console.log(dataToPost);
        if((dataToPost['monto'] == 0) || (dataToPost['tag']==undefined)){
            swal("Por favor indique una etiqueta o monto.", {
                position: 'top-end',
                icon: 'warning',
                timer: 2500
            }).then(()=>{
                $('#tb-montos .td-monto').empty();
                $('#cmb-cod').val('').change()
                $('#cmb-tag').val('').change()
                $('#tb-montos #add-cod-monto').focus();
            });
        }
        else if(Decim && dataToPost['monto'].split('.')[1].length > 2){
            swal("No es posible ingresar un monto con mas de 2 decimales!", {
                position: 'top-end',
                icon: 'warning',
                timer: 2500
            }).then(()=>{
                $('#tb-montos #inptmonto').focus();
            });
        }
        else{
            $.ajax({
                type: 'post',
                url: '../../Items/add.php',
                data: dataToPost,
                success: function(res){
                    var datos = JSON.parse(res);
                    console.log(datos['mensaje']);
                    rowCount = document.getElementById('tb-montos').rows.length;
                    n = -1;
                    if(rowCount > 2){
                        n = 2;
                    }
                    tabla = document.getElementById('tb-montos').insertRow(n);
                
                    col1 = tabla.insertCell(0);
                    col2 = tabla.insertCell(1);
                    col3 = tabla.insertCell(2);
                    col4 = tabla.insertCell(3);
                    col5 = tabla.insertCell(4);
    
                    col1.innerHTML = datos['idm'];
                    col1.setAttribute('hidden', 'true')
    
                    col2.innerHTML = datos['tipo'];
                    //col2.setAttribute('hidden', 'true')
                    if(datos['tipo']=='1'){
                        col2.innerHTML = "<h4><i class='bi bi-arrow-up-circle-fill text-success'></i></h4>"
                    }
                    if(datos['tipo']=='-1'){
                        col2.innerHTML = "<h4><i class='bi bi-arrow-down-circle-fill text-danger'></i></h4>"
                    }
                    col2.classList.add('text-end');
    
                    col3.innerHTML = datos['tag'];
                    //col3.setAttribute('contenteditable', 'true');
    
                    col4.innerHTML = number_format(datos['monto'], 2, '.', ' ')
                    col4.classList.add('text-end');
    
                    //col5.innerHTML = "<button class='update-monto  btn btn-outline-success btn-sm'><i class='bi bi-pencil-square'></i> editar</button>"
                    //col5.innerHTML += "   "
                    col5.innerHTML += "<button class='del-monto btn btn-outline-danger btn-sm'><i class='bi bi-trash3'></i> Eliminar</button>"  
                    col5.classList.add('text-center');
    
                    $('#tb-montos #inptmonto').val('');
                    $('#cmb-tag').val('').change()
                    $('#cmb-tag').focus();

                    // // ACTUALIZAR TABLA DE MONTOS
                    // var dataBol = {'n':$('#n-data-bol').val(), 'fecha': $('#fecha-data-bol').val(), 'codPlanilla':$('#codPlanilla-data-bol').val(), 'anulado':'-'}
                    // dataBoleta(dataBol);
                }
            });
        }
        return false;
    });

    // BUTTON - DELETE MONTO
    $('.modal-body-2').on('click', '.del-monto', function(){
        dataRow = getDataRow(this);
        dataDel = {'idm': dataRow[0], 'tipo':dataRow[1], 'tag':dataRow[2], 'monto': dataRow[3], 'n':$('#n-data-bol').val(), 'accion': 'del'};
        console.log(dataDel);
        swal({
            title: "Estas seguro de eliminar esta entrada?",
            text: 'Se eliminará el monto: ' + dataDel['tipo'] + ' ' + dataDel['tag'] + ' / ' + dataDel['monto'],
            icon: "warning",
            buttons: ["Cancelar","Eliminar"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type:'post',
                    url: '../../Items/add.php',
                    data: dataDel,
                    success: function(res){
                        console.log(res);
                    }
                });
                $(this).closest('tr').remove();

                swal({
                    title: 'El codigo ' + dataDel['cod']  + ' con monto ' + dataDel['monto'] +' ha sido eliminado!',
                    icon: 'success'
                });
            }
        });
        return false;
    });

    // BUTTON - EDIT MONTO
    $('.modal-body-2').on('click', '.update-monto', function(){
        dataRow = getDataRow(this);
        dataMonto = {'idm': dataRow[0], 'cod': dataRow[1], 'tag':dataRow[2], 'monto': dataRow[3], 'n':$('#n-data-bol').val(), 'accion': 'update'};
        console.log(dataMonto);

        if((dataMonto['monto'] == 0) || (dataMonto['cod']==0)){
            swal("No es posible ingresar un codigo o monto igual a 0!", {
                position: 'top-end  ',
                button: false,
                icon: 'warning',
                timer: 2500
            }).then(()=>{
                dataBol = {'n':$('#n-data-bol').val(), 'fecha':$('#fecha-data-bol').val(), 'codPlanilla':$('#codPlanilla-data-bol').val()}
                dataBoleta(dataBol);
            });
        }
        else{
            $.ajax({
                type: 'post',
                url: '../../Items/add.php',
                data: dataMonto,
                success: function(res){
                    var resultado = $.trim(res);
                    console.log(res);
                    
                    if(resultado == "ERROR"){
                        swal('Error!', 'No se pudo guardar los datos por que existen campos vacios', 'error');
                    }
                    else{
                        swal('Exito!', 'Se guardaron los datos!', 'success');
                    }
                }
            });
        }
        console.log(dataMonto);
        return false;
    });

    // COMBOBOX - CHANGE
    $('.modal-body-2').on('change', '#cmb-cod', function(){
        // var cod = this.value;
        // console.log(cod);
        // $.ajax({
        //     type: 'post',
        //     url: '../../Items/search.php',
        //     data: {'cod': cod},
        //     success: function(res){
        //         var newOptions = JSON.parse(res);
        //         var select = $("#cmb-tag");
        //         select.empty();
        //         newOptions.forEach(e => {
        //             select.append($("<option></option>").attr("value", e).text(e));
        //         });
        //     }
        // });
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

    $("#ModalAgregarPersona").click(function(e){
        $("#myModal").modal('show');
        e.preventDefault();
        $("#BuscarDNI").click(function(e)
        {
            // alert('Ingresó a buscar DNI');
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

    // FUNCTIONS
    function getDataFormJSON(idForm){
        dataObj = {};
        $($(idForm).serializeArray()).each(function(_, field){
            dataObj[field.name] = field.value;
        });
        return dataObj
    }
    
    function dataBoleta(datosBoleta){
        console.log(datosBoleta);
        $.ajax({
            type: "POST", 
            url: "../../Items/search.php",
            data: datosBoleta,
            success: function(data){
                $('#bodyModalBoleta').html('');
                $('#bodyModalBoleta').html(data);
                $('#bol-idp-shw').val($('#idp-shw').val());
                $('#idp-data-bol').val($('#idp-shw').val());
                $('#bol-codMod-shw').val($('#codMod-shw').val());
                $('#bol-nombres-shw').val($('#apPaterno-shw').val() + ' ' +  $('#apMaterno-shw').val() + ' ' + $('#nombres-shw').val());
                $('#bol-condicion-shw').val($('#condicion-shw').val());
                $('.onlynumber').keydown(soloNumeros);
    
                if(datosBoleta['fecha']!='' && datosBoleta['codPlanilla']!=''){
                    $('.add-monto').prop('disabled', false);
                    $('#delbtn-bol').prop('disabled', false);
                    $('#frm-monto').removeAttr("hidden");
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

    function soloNumeros(e){
        var key = window.Event ? e.which : e.keyCode;
        var not_numbers = ((key < 48 || key > 57) && (key < 96 || key > 105));
        var not_backspace_tab = (key!==8 && key!==9);
        var not_points = (key!=190 && key!=110);
        var not_arrows = (key < 37 || key > 40);
        
        // hay decimales?
        var arr = $(this).val().split('.');
        if(arr.length > 1){
            if(not_numbers && not_backspace_tab && not_arrows){
                e.preventDefault();
            }
        }
        else{
            if(not_numbers && not_backspace_tab && not_points && not_arrows){
                e.preventDefault();
            }
        }
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
});



