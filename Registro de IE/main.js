function enviarGO(pagina, idform){
    form = document.getElementById(idform);
    form.action = pagina;
    form.submit();
}

// function objetoAjax(){
//     var xmlhttp=false;
//     try{
//       xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
//     }
//     catch (e){
//       try {
//         xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
//       }
//       catch (E){
//         xmlhttp = false;
//       }
//     }
//     if (!xmlhttp && typeof XMLHttpRequest!='undefined'){
//       xmlhttp = new XMLHttpRequest();
//     }
//     return xmlhttp;
// }

  
// function Enviar() {
//     valor = document.getElementById('valor').value;
//     ajax = objetoAjax();
//     ajax.open("POST", "datos.php", true);
//     ajax.onreadystatechange=function(){
//         if (ajax.readyState==4){
//             document.getElementById("resultado").innerHTML = ajax.responseText;
//         }
//     }
//     ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     ajax.send("varp2="+valor)
// }
  

// function alerta(){
//     valor = document.getElementById('valor').value;
//     alert(valor);
// }