@if(isset($mov))
<div id="prod">
    <br><br>
    <h1 class="center fat">Productos</h1>
    <ul class="collapsible" data-collapsible="accordion">
    @foreach($productos as $n)
    
    <li>
        <div class='collapsible-header'><i class='material-icons'>whatshot</i>{{$n->producto}}</div>
        <div class='collapsible-body'>
            <center>
                <img src='images/productos/{{$n->img}}'>
            </center>
            <p>{{ $n->descripcion }}</p>
        </div>
    </li>        
              
    @endforeach    
    </ul>                            
</div>    

@else

<div id="prod">
    <br><br>
    <h1 class="center fat">Productos</h1>
    <div class="row">
        @foreach($productos as $n)       
             <div class=' col s6 m6'>
                <div class='row card'>
                    <div class=' col s12 l5'>
                        <img class='activator responsive-img' src='images/productos/{{$n->img}}'>
                    </div>
                    <div class='col s12 l7'>
                        <h5>{{ $n->producto }}</h5>
                        <p>{{ substr($n->descripcion,0,35 )}}...</p>
                        <a class="btn blue" onclick="showProducto('{{$n->producto}}','<?php echo $n->descripcion; ?>', '{{$n->img}}')">Leer mas..</a>
                    </div>
                    <div class='' style="display:none">
                        <span class='card-title grey-text text-darken-4'>{{ $n->producto }}<i class='material-icons right'>close</i></span>
                        <p>{{ $n->descripcion }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
    
</div>
@endif