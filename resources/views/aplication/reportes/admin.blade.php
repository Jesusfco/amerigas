@extends('layouts.app')
@section('stylesheets')    
    <link href="{{ asset('/js/jqueryAutocomplete/jquery-ui.min.css') }}" type="text/css" rel="stylesheet"  >
    <link href="{{ asset('/js/jqueryAutocomplete/jquery-ui.theme.min.css') }}" type="text/css" rel="stylesheet"  >
@stop
@section('content')

<div id="principal">
    <div class="row">
        <br>
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 style="margin: 0;" align='center'>Reportes PDF</h3></div>
                <div class="panel-body">
                 
                    <h4>Reporte de este mes</h4>
                    <a href="{{url('admin/reportes/mesActual')}}" target="_blank">
                        <button>{{ date('F') }}</button>
                    </a>
                    
                    <h4 style="text-align: center">Parametro por fecha</h4>                    
                    @if(Session::has('error1'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong> La empresa no se encuentra registrada
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/reportes/parametro')}}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cliente</label>
                            <div class="col-md-6">
                                <input id="autocomplete" type="text" onfocusout="upper(this)" class="form-control" name="empresa" value="TODOS"  autofocus>

                                @if ($errors->has('empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('date1') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Fecha 1</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date1" value="{{ old('date1') }}" required>
                               
                                @if ($errors->has('date1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date1') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('date2') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Fecha 2</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date2" value="{{ old('date2') }}" required>
                               
                                @if ($errors->has('fecha2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date2') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                                                                                                                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                     Ver PDF
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script src="{{ url('js/jqueryAutocomplete/jquery-ui.min.js')}}"></script>
<script>
    function upper(a){
        setTimeout(function(){
            a.value = a.value.toUpperCase();
        }, 1);
    }
    
   $( function() {
    var availableTags = [
      @foreach($empresas as $n)
      "{{ $n->empresa}}",
      @endforeach
    ];
    $( "#autocomplete" ).autocomplete({
      source: availableTags,
      minLength: 1
    });
  } );
</script>
@endsection
