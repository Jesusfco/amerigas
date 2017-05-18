<!DOCTYPE html>
<html lang="en">
<head>
 @if(isset($mov))    
   <script>
        var width = screen.width;   
        if(width >= 705) { 
          location.href = "/";
        }                 
    </script>
 @else
    <script>
        var width = screen.width;                        
        if(width < 705) { 
          location.href = "mov";
        }    
    </script>
 @endif
    <link rel="icon"  href="{{ url('images/icon/amerigasIcon.ico')}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>AmeriGas</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    <link href="{{ asset('loader/loader.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/principal/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{ asset('css/principal/header.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('/sweet/sweetalert.css') }}" type="text/css" rel="stylesheet"  >
    <link href="{{ asset('css/principal/index.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/principal/slider2.css')}}" type="text/css" rel="stylesheet"/>
    <link href="{{ asset('css/principal/productos.css')}}" type="text/css" rel="stylesheet"/>
     <link href="{{ asset('css/principal/curriculum.css')}}" type="text/css" rel="stylesheet"/>
     <link href="{{ asset('css/principal/pdf.css')}}" type="text/css" rel="stylesheet"/>


</head>
<body>

<input type="hidden" value="esp" id="idioma">

<div id="loader">

    <center>
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                        </div>
            </div>
        </div>
        <h5 class="light">Cargando</h5>
    </center>
</div>
<div id="contein">
@extends('index.scripts')
@extends('index.contacto')
@extends('index.descargas')
@extends('index.curriculum')
@extends('index.productos')
@extends('index.slider2')
@extends('index.nosotros')
@extends('index.slider1')
@extends('index.header')    


@if(isset($mov))
@endif


    <style>
        .slide2sks-container { 
            height: 150px;
        }        
    </style>

</body>
</html>