 $(window).load(function(){
    $('.slider').slider();
      
    var heightVenta = $(window).height();
     var widthtVenta = $(window).width();

     $('.slider').height(heightVenta -80);
     $('.slides').height(heightVenta -60);


     if(widthtVenta >= 700) {
         var alturaCaption = $('.caption').height();
         var mitad = $('.slider').height() / 2;
         alturaCaption = alturaCaption / 2;
         alturaCaption = mitad - alturaCaption;
         $('.caption').css({"top": alturaCaption - 100});
         console.log('Altura caption:' + alturaCaption);
         console.log('Slider height:' + heightVenta);
         console.log("mitad: " + mitad);
     }


    
});

  


