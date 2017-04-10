$("#logo").click( function(){
    var posicion = $(".parallax-container").offset().top;
    $("html, body").animate({
        scrollTop: 0
    }, 750);     
});

$("#quie").click(function(){
    var posicion = $("#quienes").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);    

});

$("#ali").click(function(){
    var posicion = $("#alianzas").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#cur").click(function(){
    var posicion = $("#curriculum").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#cont").click(function(){
    var posicion = $("#contacto").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#in").click(function(){
    var posicion = $("#contacto").offset().top;
    $("html, body").animate({
        scrollTop: 0
    }, 750);     
});

$("#pro").click(function(){
    var posicion = $("#prod").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});


//Para verson movil

$("#quie1").click(function(){
    var posicion = $("#quienes").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#ali1").click(function(){
    var posicion = $("#alianzas").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#cur1").click(function(){
    var posicion = $("#curriculum").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#cont1").click(function(){
    var posicion = $("#contacto").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});

$("#in1").click(function(){
    var posicion = $("#contacto").offset().top;
    $("html, body").animate({
        scrollTop: 0
    }, 750);     
});

$("#pro1").click(function(){
    var posicion = $("#prod").offset().top;
    $("html, body").animate({
        scrollTop: posicion
    }, 750);     
});