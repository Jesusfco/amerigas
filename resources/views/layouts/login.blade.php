<!DOCTYPE html>
<html lang="en">
<head>
<!--   <script>
        var width = screen.width;
        if(width < 705) { 
          location.href = "mov/";
        }        
        console.log(width);        
    </script>-->
  <link rel="icon"  href="{{ url('images/icon/amerigasIcon.ico')}}">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>AmeriGas</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
  <link href="{{ asset('css/principal/materialize.css')}}" type="text/css" rel="stylesheet">  
  <link href="{{ asset('css/principal/header.css')}}" type="text/css" rel="stylesheet"/>
  <link href="{{ asset('css/principal/login.css')}}" type="text/css" rel="stylesheet"/>
</head>
<body>


<div style="z-index: 100000;">
<nav class="white" role="navigation" style="z-index: 100000;">
    <div class="nav-wrapper">
        <a href="/">
            <img src="images/amerigas.png" class="logoHeader" id="logo">
        </a>
        <a href="eng">
            <img class="flag hide-on-med-and-down" src="images/english.jpg" style="width: 55px;">
            
        </a>
        
      <ul class="right hide-on-med-and-down">
          <li><a class="black-text" href="/">Inicio</a></li>
          <li><a class="black-text" href="login"><i class="material-icons left">work</i><span style="display: inline">Accesar</span></a></li>
      </ul>
            
        <ul id="nav-mobile" class="side-nav">
            <li><a href="eng">English</a></li>
            <li><a href="/">Inicio</a></li>
            <li><a href="login"><i class="material-icons">work</i><span>Accesar</span></a></li>               
        </ul>
        <a href="#" data-activates="nav-mobile" class="blue-text right button-collapse"><i class="material-icons">menu</i></a> 

      
    </div>
    
  </nav>
</div>
 
    
    
@yield('content')

@extends('index.scripts')


</body>
</html>