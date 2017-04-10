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
                    <a href="{{url('cliente/reportes/mesActual')}}" target="_blank">
                        <button>{{ date('F') }}</button>
                    </a>
                    
                    <h4 style="text-align: center">Reportes por Periodo</h4>                    
                    
                    <form class="form-horizontal" role="form" method="GET" action="{{url('cliente/reportes/parametro')}}">
                        {{ csrf_field() }}                       

                        <div class="form-group {{ $errors->has('date1') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Inicio del Periodo</label>
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
                            <label for="date" class="col-md-4 control-label">Final del Periodo</label>
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
@endsection
