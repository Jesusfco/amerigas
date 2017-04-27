<div class="curriculum grey lighten-4" id="curriculum">
    <br><br>
    <h1 class="center fat">Experiencia</h1>
    <br>
    <div class="container row">
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

        <div class="col l4 m6">
            <div class="card" id="curriculumDiv">
                <div style="background-image:  url(images/curriculum/{{ $n->img }})" id="curriculumImg">
                    <a class="btn-floating btn-large waves-effect waves-light light-blue darken-3">
                        <i class="material-icons">description</i>
                    </a>
                </div>
                <div class="row">
                    <div class="col s3">
                        <div class=" red darken-4 center white-text "><i class="material-icons white-text">today</i>
                            {{$n->fecha }}</div>
                    </div>
                    <div class="col s9">
                        <p>{{ substr($n->descripcion,0,90) }}...</p>
                    </div>
                </div>
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