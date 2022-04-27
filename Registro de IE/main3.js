function enviar(pagina, idform){
    form = document.getElementById(idform);
    form.action = pagina;
    form.submit();
}

$(document).ready(function() {
    $('#tabla').DataTable( {

        "language": {"url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json"},

        //"paging": false,

        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],

        dom: 'Bfrtip',
        lengthMenu: [
            [ 20],
            ['20']
        ],

        buttons: [
            'pageLength'
        ],
        
        initComplete: function () {
            this.api().columns([0]).every( function () {
                var column = this;
                var select = $("<select class='form-select d-inline' id='combo' style='padding: 3px;'><option class='small p-1' value=''>(Todo)</option></select>")
                    .appendTo( $('#box') )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().each( function ( d, j ) {
                    tag = d;

                    switch (d) {
                        case 'PER_ADM':
                            tag = 'Personal y Administrativos'; break;
                        case 'DIRECTOR':
                            tag = 'Directivos'; break;
                        case 'PROFESOR':
                            tag = 'Docentes'; break;
                        case 'AUXILIAR':
                            tag = 'Auxiliares'; break;
                        case 'COORDINADOR':
                            tag = 'Coordinadores'; break;
                        case 'JEFE':
                            tag = 'Jefes'; break;
                        case 'ESPECIALISTA':
                            tag = 'Especialistas'; break;
                        case 'FORMADOR':
                            tag = 'Formadores'; break;
                        case 'VACANTES':
                            tag = 'Plazas Vacantes'; break;
                    }

                    select.append( '<option class="small p-1" value="'+d+'">'+tag+'</option>' )
                } );
            } );
        }
    } );

    $("#tabla1_filter").appendTo('<b>Custom tool bar! Text/images etc.</b>');
} );


//$("#container").html('<b>Custom tool bar! Text/images etc.</b>');