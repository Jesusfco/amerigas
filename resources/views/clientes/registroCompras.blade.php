@extends('layouts.app')
@section('stylesheets')    
    <link href="{{ asset('/sweet/sweetalert.css') }}" type="text/css" rel="stylesheet"  >
@stop

@section('content')
 
        <div class="panel panel-default" id="principal">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                <h2 style="text-align: center">Registro de Compras</h2>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <form method="GET" class="navbar-form" style="margin-top: 22px;">
                     <div class="input-group">
                        <input name="search" class="form-control" placeholder="Buscar" autofocus>
                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                            </span>
                    </div>
                    </form>     
                </div>
            </div>                        
                    <div class="table-responsive">
                    <table class="table table-hover table-condensed">                
                        <thead>
                            <th>Fecha</th>
                            <th>Volumen</th>
                            <th>Producto</th>
                            <th>Entregado a:</th>                            
                            
                        </thead>
                        <tbody>
                        @foreach($registros as $n)
                        <tr>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->fecha_descarga }}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->volumen }}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->producto }}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->receptor }}
                            </td>                            
                                                        
                        </tr>                                                
                        @endforeach
                    </tbody>
                    </table>  
                    </div>
                    <center>
                        {{ $registros->links() }}
                    </center>

                    
                
            </div>        

@endsection
@section('javascript')
    <script src="{{asset('sweet/sweetalert.min.js')}}"></script>
    
@endsection