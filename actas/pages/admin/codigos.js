$(document).ready(function(){
    $('.codtable').DataTable({
        language: { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" },
        order: [],
        iDisplayLength: 15,
        searching: false,
        info: false,
        dom: '<"toolbar">frtip'
    });

    $('div.toolbar').html('');

    $('.onlynumber').keydown(soloNumeros);

    $('#addbtn-cod').click(function(){
        var dataToPOST = getDataFormJSON('#addfrm-cod');
        dataToPOST.accion = 'add';
        
        console.log(dataToPOST);
        $.ajax({
            type: 'post',
            url: '../../Items/add.php',
            data: dataToPOST,
            success: function(res){
                if(res == 'ERROR'){
                    swal({
                        title: 'No deje campos vacios.',
                        icon: 'error'
                    });
                    
                }
                else{
                    swal({
                        title: 'El codigo fue añadido exitosamente!',
                        icon: 'success'
                    })
                    .then(() => {
                        location.reload(); 
                    });
                }
            }
        });
        return false;
    });

    $('.delbtn-cod').click(function(){
        var delbtn = this;
        dataRow = getDataRow(delbtn);
        dataToPOST = {'idc': dataRow[0], 'cod': dataRow[1], 'tag':dataRow[2], 'accion': 'del'};
        console.log(dataToPOST);

        swal({
            title: "Estas seguro de eliminar esta entrada?",
            text: 'Se eliminará el codigo ' + dataToPOST['cod'] + ' y ' + dataToPOST['tag'],
            icon: "warning",
            buttons: ["Cancelar","Eliminar"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete){
                $.ajax({
                    type: 'post',
                    url: '../../Items/add.php',
                    data: dataToPOST,
                    success: function(){
                        // delbtn.closest('tr').remove();
                    }
                });

                swal({
                    title: 'El codigo ' + dataToPOST['cod']  + ' - ' + dataToPOST['tag'] +' ha sido eliminado!',
                    icon: 'success'
                })
                .then(() => {
                    location.reload(); 
                });
            }
        });
        return false;
    });

    function getDataRow(obj){
        $tr = $(obj).closest('tr');
        data = $tr.children("td").map(function(){
            return $(this).text().replace(/\s+/g, " ").trim();
        }).get();
        return data
    }

    function getDataFormJSON(idForm){
        dataObj = {};
        $($(idForm).serializeArray()).each(function(_, field){
            dataObj[field.name] = field.value;
        });
        return dataObj
    }

    function soloNumeros(e){
        var key = window.Event ? e.which : e.keyCode;
        if ((key < 48 || key > 57) && (key < 96 || key > 105) && (key!==8 && key!==109 && key!==9)){
            e.preventDefault();  
        }
    }

});