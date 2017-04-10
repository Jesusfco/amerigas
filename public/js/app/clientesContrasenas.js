//$(document).ready(function(){
////    optionPop(n);
//});


function newContrasenaPop(id,empresa) { 
    swal({
            title: "Establecer contraseña para " + empresa,
            text: "Escriba una contraseña nueva",
            type: "input",
            showCancelButton: true,
            confirmButtonColor: "green",
            closeOnConfirm: false,
            animation: "slide-from-top",
            cancelButtonColor: "red",
            confirmButtonText: "Modificar",        
            cancelButtonText: "Cancelar",                    
            closeOnCancel: true,
            inputPlaceholder: "*************"
          },
         function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
              swal.showInputError("You need to write something!");
              return false
            }
            var contraseña1 = inputValue;

            swal({
                title: "Confirme la contraseña",                
                type: "input",
                showCancelButton: true,
                confirmButtonColor: "green",
                closeOnConfirm: false,
                animation: "slide-from-top",
                cancelButtonColor: "red",
                confirmButtonText: "Confirmar",        
                cancelButtonText: "Cancelar",                    
                closeOnCancel: true,
                inputPlaceholder: "*************************"
              },function(inputValue) {
                    var contraseña2 = inputValue;
                    
                    if (inputValue === false) return false;
                    if (inputValue === "") {
                      swal.showInputError("You need to write something!");
                      return false
                    }
                    else if(contraseña2 != contraseña1) {
                      swal.showInputError("Las contraseñas no coinciden");
                      return false
                    }
                    if(contraseña1 == contraseña2) { 
                         swal({
                            title: "Restablece la contraseña",
                            text: "Demorara unos pequeños momentos",
                            type: "info",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                          },
                          function(){
                            
                            ajaxRequest(id, contraseña1);
                            
                        });
                    }
                    
                    
              });
          });
}


function ajaxRequest(id,contraseña){
    $.ajax({
        type: "GET",
        url: "restablecerContraseñas",
        async: true,
        data: {                                                  
            contrasena : contraseña,
            id : id
        },
        success: function(data){                                                                
            setTimeout(function(){
                swal({
                    title: "Contraseña Restablecida",
                    text: data,
                    timer: 1500,
                    type: 'success',
                    showConfirmButton: false
                });
            });

        },
        error: function(xhr, ajaxOptions, thrownError){
            setTimeout(function(){
                swal({
                    title: "Error",
                    text: "No se pudo restablecer la contraseña, si el problema persiste pongase en contacto con el tecnico",
                    timer: 1500,
                    type: 'error',
                    showConfirmButton: false
                    });
                });


            }
        });
}