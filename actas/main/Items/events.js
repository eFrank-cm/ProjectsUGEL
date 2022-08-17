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
            console.log(datos);
            e.preventdefault;
            $.ajax({
                type: "POST",
                url: "search.php",
                data: datos,
                success:function(r){
                    $('#res-srch-per').html(r)

                    // BUTTON - SELECT PERSONA
                    $('.select').on('click', function(){
                        $tr = $(this).closest('tr');
                        var data = $tr.children("td").map(function(){
                            return $(this).text().replace(/\s+/g, " ").trim();
                        }).get();
                        console.log(data)
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
                
                $('#div-btn-add-bol').append(
                    $(document.createElement('input')).prop({
                        type: 'button',
                        id: 'submit',
                        value: 'Agregar Boleta 2',
                        className: 'btn'
                    })
                );
            }
        })
        return false;
    });

    // BUTTON - SHOW NEW BOLETA
    $('#div-btn-add-bol').on('click', '#btn-add-bol', function(){
        dataBoleta('--');
    });

    // BUTTON - ADD BOLETA
    $('#data-bol').on('click', '#save-bol', function(){
        dataBol = getDataFormJSON('#frm-data-bol');
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
            }
        })
        return false;
    });

    // BUTTON - ADD MONTO
    $('#data-bol').on('click', '.add-monto', function(){
        $tr = $(this).closest('tr');
        dataTmp = $tr.children("td").map(function(){
            return $(this).text().replace(/\s+/g, " ").trim();
        }).get();

        dataMonto = {'cod':dataTmp[0], 'monto': dataTmp[1], 'n':$('#n-data-bol').val()};
        console.log(dataMonto);

        $.ajax({
            type: 'post',
            url: 'add.php',
            data: dataMonto,
            success: function(res){
                datos = JSON.parse(res);
                tabla = document.getElementById('tb-montos').insertRow(1);
                col1 = tabla.insertCell(0);
                col2 = tabla.insertCell(1);
                col3 = tabla.insertCell(2);
                col1.innerHTML = datos['cod'];
                col2.innerHTML = datos['monto'];
                col3.innerHTML = "<button class='del-monto'>eliminar</button>"
            }
        });
        $('')
    });
});

function getDataFormJSON(idForm){
    dataObj = {};
    $($(idForm).serializeArray()).each(function(_, field){
        dataObj[field.name] = field.value;
    });
    return dataObj
}

function dataBoleta(n){
    $.ajax({
        type: "POST", 
        url: "search.php",
        data: {'n': n},
        success: function(data){
            $('#data-bol').html(data);
            $('#bol-idp-shw').val($('#idp-shw').val());
            $('#idp-data-bol').val($('#idp-shw').val());
            $('#bol-codMod-shw').val($('#codMod-shw').val());
            $('#bol-nombres-shw').val($('#nombres-shw').val());
            $('#bol-condicion-shw').val($('#condicion-shw').val());

            // $('$add-bol').click(function(){
            //     dataBol = getDataFormJSON('#data-bol');
            //     console.log(dataBol);
            // });
            
        } 
    });
}

// function cancelar(){
//     $('#datos-boleta').html('')
// }

// function insertRow(data){
//     tabla = document.getElementById('tb-montos').insertRow(1);

//     col1 = tabla.insertCell(0);
//     col2 = tabla.insertCell(1);
//     col3 = tabla.insertCell(2);

//     col1.innerHTML = $('#cod-add').val('uno');
//     col2.innerHTML = $('#monto-add').val(data[1])
//     col3.innerHTML = "<button>eliminar</button>"
// }









