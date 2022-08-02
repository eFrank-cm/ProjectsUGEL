$(document).ready(function(){
    $('#btn-srch-per').click(function(){
        if($('#kw-srch').val().length != 0){
            datos = $('#frm-srch-per').serialize();
            console.log(datos)
            $.ajax({
                type: "POST",
                url: "search.php",
                data: datos,
                success:function(r){
                    $('#res-srch-per').html(r)
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
                                $('#tb-bol').html(res)
                            }
                        })
                    });
                }
            });    
        }
        return false;
    });

    $('#btn-add-bol').click(function(){
        $.ajax({
            type: "POST", 
            url: "search.php",
            data: {'n': '--'},
            success: function(data){
                $('#data-bol').html(data);
                $('#bol-idp-shw').val($('#idp-shw').val());
                $('#bol-codMod-shw').val($('#codMod-shw').val());
                $('#bol-nombres-shw').val($('#nombres-shw').val());
                $('#bol-condicion-shw').val($('#condicion-shw').val());
            } 
        });
    });

    $('.rd-select').on('change', function(){
        disabledAdd = true; disabledSearch = false;
        if($(this).val()=='add'){
            disabledAdd = false; disabledSearch =true;
        }

        // SEARCH
        $('#kw-srch').prop('disabled', disabledSearch);
        $('#btn-srch-per').prop('disabled', disabledSearch);
        $('.select').prop('disabled', disabledSearch)
        
        // ADD
        $('#codMod-add').prop('disabled', disabledAdd);
        $('#nombres-add').prop('disabled', disabledAdd);
        $('#condicion-add').prop('disabled', disabledAdd);
        $('#btn-add-per').prop('disabled', disabledAdd);
    });

    $('#btn-add-per').click(function(){
        datos = $('#frm-add-per').serialize();
        console.log(datos);
        $.ajax({
            type: 'POST',
            url: 'add.php',
            data: datos,
            success: function(r){
                $('#hh').html(r);
            }
        })
        return false;
    });

});
// function cancelar(){
//     $('#datos-boleta').html('')
// }

// function insertRow(){
//     tabla = document.getElementById('montos').insertRow(1);

//     col1 = tabla.insertCell(0);
//     col2 = tabla.insertCell(1);
//     col3 = tabla.insertCell(2);

//     col1.innerHTML = $('#cod-add').val()
//     col2.innerHTML = $('#monto-add').val()
//     col3.innerHTML = "<button>eliminar</button>"
// }









