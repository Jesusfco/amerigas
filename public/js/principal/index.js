 $(document).ready(function(){   
    $('.slider').slider();
      
    var heightVenta = $(window).height();
    var alturaHijo = $('#hijoParallax').height();
    var alturaCaption = $('.caption').height();
    var mitad = heightVenta/2;
    alturaCaption = alturaCaption/2;
    alturaCaption = mitad - alturaCaption;
//    $('.caption').css("top", alturaCaption);

    $('.slider').height(heightVenta -80);
    $('.slides').height(heightVenta -60);
    
});

  


