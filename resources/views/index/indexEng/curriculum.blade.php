<div class="curriculum grey lighten-4" id="curriculum">
    <br><br>
    <h1 class="center fat">Résumé</h1>
    <br>
    <div id="curriculumContainer">

        @foreach($historias as $n)

                <div class="card" id="curriculumDiv">
                    <div id="sur{{$n->id}}" style="opacity: 0">
                        <div onclick="curriculum({{$n->id}});">
                            <div style="background-image:  url(images/mov/curriculum/{{ $n->img }})" id="curriculumImg">
                                <a class="btn-floating btn-large waves-effect waves-light light-blue darken-3">
                                    <i class="material-icons">description</i>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s3" style="padding: 0">
                                <div class=" red darken-4 center white-text " id="curriculumDate" style="padding: 3px"><i class="material-icons white-text">today</i><br>
                                    {{$n->fechaEng }}</div>
                            </div>
                            <div class="col s9">
                                <p>{!!   substr($n->descripcionEng,0,95) !!}...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-action" id="curriculumLeer" onclick="curriculum({{$n->id}});">
                        <span>LEER MAS...</span>
                    </div>
                </div>
        @endforeach

</div>

    <center>
        <a class="btn red darken-4" href="pdf/CV_AMERIGAS_ENG.pdf" target="_blank">Download Resume<i class="material-icons">play_for_work</i></a>
    </center>
    <br>
</div>

<div id="curriculumWindow" style="display: none">
    <div id="popCurriculum">
        <div>
            <img>
        </div>
        <h5></h5>
        <p></p>
    </div>
</div>