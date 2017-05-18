function curriculum(id){
    $.ajax({
        method: "GET",
        url: "curriculum",
        data: {
            id: id
        }

    }).done(function( msg ) {


        if( $('#idioma').val() == 'esp') {
            $('#curriculumWindow').css('display','flex');
            $('body').css('overflow', 'hidden');

            if($(window).width() >= 700 ) {
                $('#popCurriculum img').attr("src",  "images/curriculum/"+ msg.img);
            } else {
                $('#popCurriculum img').attr("src",  "images/mov/curriculum/"+ msg.img);
            }
            $('#popCurriculum h5').text(msg.fecha);
            $('#popCurriculum p').text(msg.descripcion);

        } else if($('#idioma').val() == 'eng') {

            $('#curriculumWindow').css('display','flex');
            $('body').css('overflow', 'hidden');

            if($(window).width() >= 700 ) {
                $('#popCurriculum img').attr("src",  "images/curriculum/"+ msg.img);
            } else {
                $('#popCurriculum img').attr("src",  "images/mov/curriculum/"+ msg.img);
            }

            $('#popCurriculum h5').text(msg.fechaEng);
            $('#popCurriculum p').text(msg.descripcionEng);
        }
    });
}


$('#curriculumWindow').click(function(){
    $(this).css('display', 'none');
    $('body').css('overflow', 'auto');
});


$(document).ready(function(){
    var idioma = $('#idioma').val();
});


