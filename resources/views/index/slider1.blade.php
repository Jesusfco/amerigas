<div class="slider" >
    <ul class="slides">
        
        @if(isset($mov))
         <li>
            <img src="images/mov/slider/1.jpg"> 
            <div class="caption center-align uno">
                <h3>Nacimos para crear y desarrollar proyectos energéticos</h3>
                <h5 class="light grey-text text-lighten-3">Mira nuestro curriculum!</h5>
            </div>
        </li>
        <li>
            <img src="images/mov/slider/2.jpg">  
            <div class="caption center-align dos">
                <h3>Colaboración con  empresas de alto prestigio</h3>
                <h5 class="light grey-text text-lighten-3">Desarrollando estructuras funcionales</h5>
            </div>
        </li>
        <li>
            <img src="images/mov/slider/3.jpg">   
            <div class="caption center-align tres">
                <h3>Diseño e implementación de sistemas de seguridad </h3>
                <h5 class="light grey-text text-lighten-3">Experiencia profesional.</h5>
            </div>
        </li>
        @else
        <li>
            <img src="images/slider/1.jpg"> 
            <div class="caption center-align uno">
                <h3>Nacimos para crear y desarrollar proyectos energéticos</h3>
                <h5 class="light grey-text text-lighten-3">Mira nuestro curriculum!</h5>
            </div>
        </li>
        <li>
            <img src="images/slider/2.jpg">  
            <div class="caption center-align dos">
                <h3>Colaboración con  empresas de alto prestigio</h3>
                <h5 class="light grey-text text-lighten-3">Desarrollando estructuras funcionales</h5>
            </div>
        </li>
        <li>
            <img src="images/slider/3.jpg">   
            <div class="caption center-align tres">
                <h3>Diseño e implementación de sistemas de seguridad </h3>
                <h5 class="light grey-text text-lighten-3">Experiencia profesional.</h5>
            </div>
        </li>
        @endif
    </ul>
  </div>



<style>
    .slider .indicators .indicator-item.active{
        background-color: blue;
    }
</style>
    