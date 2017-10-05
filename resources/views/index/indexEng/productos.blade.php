@if(isset($mov))
<div id="prod">
    <br><br>
    <h1 class="center fat">Products</h1>
    <ul class="collapsible" data-collapsible="accordion">
    @foreach($productos as $n)
    
    <li>
        <div class='collapsible-header'><i class='material-icons'>whatshot</i>{{$n->product}}</div>
        <div class='collapsible-body'>
            <center>
                <img src='images/productos/{{$n->img}}'>
            </center>
            <p><?php echo $n->descripcionEng; ?></p>
        </div>
    </li>        
              
    @endforeach    
    </ul>                            
</div>

@else

    <div id="prod">
        <br><br>
        <h1 class="center fat">Products</h1>
        <div class="productoContainer">
            @foreach($productos as $n)
                <div class='productoCard'>
                    <div class='row card'>
                        <div class=' col s12 l5'>
                            <img class='activator responsive-img' src='images/productos/{{$n->img}}'>
                        </div>
                        <div class='col s12 l7'>
                            <h5>{{ $n->product }}</h5>
                            <p>{{ substr($n->descripcionEng,0,35 )}}...</p>
                            <a class="btn blue" onclick="showProducto('{{$n->product}}','{{ $n->descripcionEng }}', '{{$n->img}}')">Leer mas..</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endif
