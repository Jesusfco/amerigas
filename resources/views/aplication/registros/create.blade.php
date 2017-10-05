@extends('layouts.app')
@section('stylesheets')    
    <link href="{{ asset('/js/jqueryAutocomplete/jquery-ui.min.css') }}" type="text/css" rel="stylesheet"  >
    <link href="{{ asset('/js/jqueryAutocomplete/jquery-ui.theme.min.css') }}" type="text/css" rel="stylesheet"  >
@stop
@section('content')

<div id="principal">
    <div class="row">

        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 style="margin: 0;" align='center'>Registrar Venta</h3></div>
                <div class="panel-body">
                    @if(Session::has('msj'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Exito!</strong> La venta ha sido registrada
                        </div>
                    @endif
                    
                     @if(Session::has('error1'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Error!</strong> La empresa que recibe no se encuentra registrada
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('registros.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Empresa que recibe</label>
                            <div class="col-md-6">
                                <input id="autocomplete" type="text" onfocusout="upper(this)" class="form-control" name="empresa" value="{{ old('empresa') }}"  autofocus required>

                                @if ($errors->has('empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Fecha de descarga</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date" value="{{ old('date') }}" required>
                               
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('volumen') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cantidad de descarga:</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="volumen" value="{{ old('volumen') }}" step="0.001" required minlength=".001">

                                @if ($errors->has('volumen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('volumen') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('producto') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Producto:</label>
                            <div class="col-md-3">
                                <select name="producto" required>
                                    <option value="{{ old('producto') }}">{{ old('producto') }}</option>
                                    <option value="BUTANO">BUTANO</option>
                                    <option value="COMBUSTOLEOS">COMBUSTOLEOS</option>
                                    <option value="CONDENSADOS">CONDENSADOS</option>
                                    <option value="DIESEL">DIESEL</option>
                                    <option value="ETANO">ETANO</option>
                                    <option value="GAS LICUADO">GAS LICUADO</option>
                                    <option value="GAS NATURAL">GAS NATURAL </option>
                                    <option value="GASAVION">GASAVION</option>
                                    <option value="GASOLEO DOMESTICO">GASOLEO DOMESTICO</option>
                                    <option value="GASOLINAS">GASOLINAS</option>
                                    <option value="HIDRATOS DE METANO">HIDRATOS DE METANO</option>
                                    <option value="IFO 180">IFO 180</option>
                                    <option value="LIQUIDO DEL GAS">LIQUIDO DEL GAS</option>
                                    <option value="METANO">METANO</option>
                                    <option value="NAFTAS">NAFTAS</option>
                                    <option value="PETROLEO CRUDO">PETROLEO CRUDO</option>
                                    <option value="PROPANO">PROPANO</option>
                                    <option value="TURBOSINA">TURBOSINA</option>
                                </select>
                                @if ($errors->has('producto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('producto') }}</strong>
                                    </span>
                                @endif                                
                            </div>

                         <label class="col-md-1 control-label">Medida</label>
                            <div class="col-md-3">
                                <select name="medida" >
                                    <option value="{{ old('producto') }}">{{ old('medida') }}</option>
                                    <option value="L.">LITROS</option>
                                    <option value="M3.">M3</option>
                                    <option value="KG.">KG</option>
                                    <option value="GAL.">GALONES</option>
                                    <option value="B.">BARRILES</option>
                                    <option value="T.M.">TONS. METRICA</option>
                                </select>
                                @if ($errors->has('medida'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('medida') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('lugar') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Lugar de descarga:</label>
                            <div class="col-md-6">
                                <input onfocusout="upper(this)" type="text" class="form-control" name="lugar" value="{{ old('lugar') }}" required>

                                @if ($errors->has('lugar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lugar') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('receptor') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Persona que recibe:</label>
                            <div class="col-md-6">
                                <input onfocusout="upper(this)" type="text" class="form-control" name="recibe" value="{{ old('receptor') }}" required>

                                @if ($errors->has('receptor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('receptor') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('repartidor') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Persona que entrega:</label>
                            <div class="col-md-6">
                                <input onfocusout="upper(this)" type="text" class="form-control" name="entrega" value="{{ old('repartidor') }}" required>

                                @if ($errors->has('repartidor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('repartidor') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                                                                        
                        
                        <hr>
                        
                        <div class="form-group{{ $errors->has('hora_camion') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hora de llegada:</label>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="hora_camion" value="{{ old('hora_camion') }}">

                                @if ($errors->has('hora_camion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hora_camion') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('hora_descarga') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Hora de descarga:</label>
                            <div class="col-md-6">
                                <input type="time" class="form-control" name="hora_descarga" value="{{ old('hora_descarga') }}">

                                @if ($errors->has('hora_descarga'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hora_descarga') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Empresa que entrega:</label>
                            <div class="col-md-6">
                                <input value="AMERIGAS" onfocusout="upper(this)" type="text" class="form-control" name="remitente" value="{{ old('remitente') }}">                                                               
                            </div>
                        </div>
                                                                                                                                                

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
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
      "<?php echo $n->empresa; ?>",
      @endforeach
    ];
    $( "#autocomplete" ).autocomplete({
      source: availableTags,
      minLength: 1
    });
  } );
</script>
@endsection




