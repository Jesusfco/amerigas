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
    <div class="row">
@foreach($productos as $n)

        
            <div class=' col s6 m4 l3 '>
                <div class='card'>
                    <div class='card-image waves-effect waves-block waves-light'>
                        <img class='' src='images/productos/{{$n->img}}'>
                    </div>
                    <div class='card-content'>
                      <span class='card-title activator grey-text text-darken-4'>{{ $n->product }}</span>

                    </div>
                    <div class='card-reveal'>
                      <span class='card-title grey-text text-darken-4'>{{ $n->product }}<i class='material-icons right'>close</i></span>
                      <p><?php echo $n->descripcionEng; ?></p>
                    </div>
                  </div>
            </div>                                           

@endforeach

    </div>
    
</div>
@endif
