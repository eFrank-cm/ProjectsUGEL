let c = 3;
function insertarFila(){
    let tabla = document.getElementById('tbDatos').insertRow(-1);
    let col1 = tabla.insertCell(0);
    let col2 = tabla.insertCell(1);

    c++;
    col1.innerHTML = "<input name='c" + c + "' type='text'>";
    col2.innerHTML = "<input name='m" + c + "' type='text'>";
}


function buscarPer(){
    // var codMod = document.getElementById('codMod').value;
    // var nombre =  document.getElementById('nombre');
    // var condicion =  document.getElementById('condicion');

    console.log('en buscarPer');

    

    // nombre.value ='Elizon Frank ' + codMod;
    // condicion.value ='Activo xd ' + codMod;
}

$(document).ready(function(){
    $('#btnguardar').click(function(){
        var datos = $('#frmajax').serialize();
        $.ajax({
            type: "POST",
            url: "buscar.php",
            data: datos,
            success:function(r){
                h = document.getElementById('h')
                if(r>0){
                    h.value = r + " si hay";
                }
                else{
                    h.value = r + " no hay";
                }
            }
        });
        return false;
    });
});