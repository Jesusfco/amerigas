@extends('layouts.app')
@section('stylesheets')    
    <link href="{{ asset('/sweet/sweetalert.css') }}" type="text/css" rel="stylesheet"  >
@stop

@section('content')


    
            
        <div class="panel panel-default" id="principal">
            <div class="row">    
                <div class="col-xs-12 col-sm-6">
                        <h2 style="text-align: center">Registro de Ventas</h2>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <form method="GET" class="navbar-form" style="margin-top: 22px;">
                        <div class="input-group">
                            <input name="search" class="form-control" placeholder="Buscar por Cliente" autofocus>
                            <span class="input-group-btn">

                            <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span> Buscar</button>
                            </span>
                        </div>
                    </form>     
                </div>
            </div>    
                    @if(session()->has('msj'))
                    <div class="alert alert-success alert-dismissible" role="alert" style="margin-bottom: 0;">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Exito! </strong>El cliente {{ old('producto') }} ha sido modificado
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table class="table table-hover table-condensed ">                
                        <thead>
                            <th>Fecha</th>
                            <th>Producto</th>
                            <th>Volumen</th>
                            <th>Cliente</th>                            
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($registros as $n)
                        <tr>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->fecha_descarga }}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->producto }}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->volumen }} {{$n->medida}}
                            </td>
                            <td onclick="optionPop({{ $n->id }}, '{{ $n->destinatario }})">
                                {{ $n->destinatario }}
                            </td>
                                                      
                            <td style="z-index: 100">
                                <a href="{{ url("admin/registros/". $n->id ."/edit")}}" class="btn btn-primary btn-xs">Editar</a>                                
                                <a  onclick="eliminar({{ $n->id }}, '{{ $n->destinatario }}')" class="btn btn-danger btn-xs"> Eliminar</a>                                                                
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
    <script src="{{asset('js/app/registroIndex.js')}}"></script>
@endsection