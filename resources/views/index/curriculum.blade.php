<div class="curriculum grey lighten-4" id="curriculum">
    <br><br>
    <h1 class="center fat">Experiencia</h1>
    <br>
    <div class="container">
@if(isset($mov))
    @foreach($historias as $n)
    <h3 class='center fat'>{{ $n->fecha}}</h3>
        <div class='row z-depth-2'><br>

             <div class='col s12 m6'>
                <img id='sur{{$n->id}}' src='images/mov/curriculum/{{$n->img}}'>
            </div>
            <div class='col s12'>
                <p class='light' id='list{{$n->id}}' style='opacity: 0'>
                    {{$n->descripcion}}
                </p>                
            </div>

        </div>
    @endforeach
@else
    @foreach($historias as $n)
    
        <h3 class='center fat'>{{$n->fecha }}</h3>  
            <div class='row white valign-wrapper z-depth-3'>          
                <div class='col s12 m6'>
                    <h5 class='light valign' id='list{{$n->id}}'>
                        {{ $n->descripcion}}
                    </h5>                
                </div>
                <div class='col s12 m6'>
                    <img src='images/curriculum/{{ $n->img }}' id='sur{{$n->id}}'>
                </div>
            </div>
    @endforeach
@endif
    </div> 
    
    
    
    <center>
        <a class="btn red darken-4" href="pdf/CV_AMERIGAS _PROPANE-SPA.pdf" target="_blank">Descaragar Curriculum<i class="material-icons">play_for_work</i></a>
    </center>
    <br>
</div>