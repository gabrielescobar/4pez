$(document).ready(function(){
    //Handles menu drop down
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
    });
});

function validaSoloTexto(cadena){
  var patron = /^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$/;
  if(!cadena.search(patron))
    return true;
  else
    return false;
}

function validaTextoNumeros(cadena){
  var patron = /^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑ]*$/;
  if(!cadena.search(patron))
    return true;
  else
    return false;
}


function validaTelefono(cadena){
    var patron = /^[0-9]*$/;
    if(!cadena.search(patron))
      return true;
    else
      return false;
}

function validaEmail(correoElectronico){
    var patron = /^([a-z]+[a-z1-9._-]*)@{1}([a-z1-9\.]{2,})\.([a-z]{2,3})$/;
    if(!correoElectronico.search(patron))
      return true;
    else
      return false;
}

var Fn = {
   validaRut : function (rutCompleto) {
       if (!/^[0-9]+-[0-9kK]{1}$/.test( rutCompleto )) {
           return false;
       }
       var tmp     = rutCompleto.split('-');
       var digv    = tmp[1];
       var rut     = tmp[0];
       if ( digv == 'K' ) {
           digv = 'k' ;
       }
       var digesto = Fn.dv(rut);
       if (digesto == digv ){
           return true;
       } else {
           return false;
       }
   },
 
   dv : function(T){
       var M=0,S=1;
       for(;T;T=Math.floor(T/10)) {
           S=(S+T%10*(9-M++%6))%11;
       }
       return S?S-1:'k';
   }
}