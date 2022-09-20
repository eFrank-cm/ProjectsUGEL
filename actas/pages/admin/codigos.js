$(document).ready(function(){
    getCodes();

    $('.onlynumber').keydown(soloNumeros);

    // ADD CODIGO
    $('#addbtn-cod').click(function(e){
        var dataToPOST = getDataFormJSON('#addfrm-cod');
        dataToPOST.accion = 'add';
        console.log(dataToPOST);
        e.preventDefault();

        if(dataToPOST['cod']!=='' && dataToPOST['tag']!==''){
            swal({
                title: 'El codigo fue añadido exitosamente!',
                icon: 'success'
            })
            .then(()=>{
                $.ajax({
                    type: 'post',
                    url: '../../Items/add.php',
                    data: dataToPOST,
                    success: function(res){
                        console.log(res)
                    }
                });

                $('#cod').val('');
                $('#tag').val('');
                getCodes();
            })
        }
        else{
            swal({
                title: 'No deje campos vacios.',
                icon: 'error'
            });
        }
    });


    $('#updbtn').click(function(e){
        getCodes();
    });

    // DEL CODIGO
    $('#divtb-posneg').on('click', '.delbtn-cod', function(){
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
                        delbtn.closest('tr').remove();
                    }
                });

                swal({
                    title: 'El codigo ' + dataToPOST['cod']  + ' - ' + dataToPOST['tag'] +' ha sido eliminado!',
                    icon: 'success' 
                });
            }
        });
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

    function getCodes(){
        $.ajax({
            type: 'post',
            url: 'searchCodes.php',
            success: function(res){
                $('#divtb-posneg').html(res);
            }
        });
    }

});