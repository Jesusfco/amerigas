$(document).ready(function(){
//    optionPop(n);
});
var n;
function optionPop(n,name,email,RFC,nombre,tel) { 
    
    swal({
        title: name,
        text: "<h5>E-mail: <strong>"+email+"</strong</h5>\n\
               <h5>RFC: <strong>"+RFC+"</strong></h5>\n\
               <h5>Nombre: <strong>"+nombre+"</strong></h5>\n\
               <h5>Tel1: <strong>"+tel+"</strong></h5>\n\
               <a href='clientes/"+n+"/edit' class='btn btn-primary'>Editar</a> && <a  onclick='eliminar("+n+", "+'"'+name+'"'+")' class='btn btn-danger'> Eliminar</a>",
        html: true
      });
}

function eliminar(n, name) { 
    
    swal({
    title: name,
    text: "¿Estas seguro de eliminar este producto?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#b60909",
    confirmButtonText: "Eliminar",
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    allowEscapeKey:true,
    allowOutsideClick:	true   
    },
    function(){
        
        $.ajax({
            type: "GET",
            url: "deleteCliente",
            async: true,
            data: {                                                  
              id : n,
              action : "DROP"                              
            },
            success: function(data){               
//                alert(data);
                setTimeout(function(){
                    swal({
                        title: "Cliente Eliminado",
                        text: "El Cliente ha sido eliminado",
                        timer: 1500,
                        type: 'success',
                        showConfirmButton: false,
                        allowEscapeKey:true,
                        allowOutsideClick:true   
                    });
                });
                location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError){
//                                alert(xhr.status);
//                                alert(thrownError);
//                 console.log(xhr);
                setTimeout(function(){
                    if(xhr.status == 402){
                        swal({
                            title: "Error: " + xhr.status,
                            text: xhr.responseJSON.message,
                            timer: 2500,
                            type: 'error',
                            showConfirmButton: false,
                            allowEscapeKey:true,
                            allowOutsideClick:true
                        });
                    }
                    else {
                        swal({
                            title: "Error: " + xhr.status,
                            text: "El usuario no ha podido ser eliminado",
                            timer: 2500,
                            type: 'error',
                            showConfirmButton: false,
                            allowEscapeKey:true,
                            allowOutsideClick:true
                        });
                    }

                });                                                                
            }//Error
        });//AJAX                                        
        
        
    });
}