function enviar() { 
    
    var correo = $('#correo').val();
    var mensaje = $('#mensaje').val();
    var nombre = $('#nombre').val();     
    var token = $('input[name="_token"]').val();
    
    
    $.ajax({
            type: "POST",
            url: "message",
            async: true,
            data: {                                                  
              correo : correo,
              nombre : nombre,
              mensaje: mensaje,
              _token: token
            },
            success: function(data){                                               
                
                setTimeout(function(){
                    swal({
                        title: "Mensaje enviado",
                        text: "Your message has been send", 
                        timer: 1500,
                        type: 'success',
                        showConfirmButton: false,
                        allowEscapeKey:true,
                        allowOutsideClick:true   
                    });
                });
               
                $('#correo').val('');
                $('#mensaje').val('');
                $('#nombre').val('');
                
            },
            error: function(xhr, ajaxOptions, thrownError){                                
                                
                setTimeout(function(){
                    swal({
                        title: xhr.status,
                        text: thrownError,
                        timer: 1500,
                        type: 'error',
                        showConfirmButton: false,
                        allowEscapeKey:true,
                        allowOutsideClick:true   
                    });
                });       

            }//Error
        });//AJAX     
        
        
          return false;
}