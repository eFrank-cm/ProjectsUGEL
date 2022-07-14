$(document).ready(function(){
    $('#btnBuscar').click(function(){
        datos = $('#frmajax').serialize();
        $.ajax({
            type: "POST",
            url: "buscar.php",
            data: datos,
            success:function(r){
                $('#result').html(r)
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
});



