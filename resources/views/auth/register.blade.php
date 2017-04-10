@extends('layouts.app')

@section('content')

<div id="principal">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 style="margin: 0;" align='center'>Registrar Cliente</h3></div>
                <div class="panel-body">
                    @if(Session::has('msj'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Exito!</strong> El usuario ha sido registrado
                        </div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('registerCustom') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('empresa') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Empresa</label>
                            <div class="col-md-6">
                                <input  type="text" onfocusout="upper(this)" class="form-control" name="empresa" value="{{ old('empresa') }}"  autofocus required>

                                @if ($errors->has('empresa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('empresa') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" onfocusout="upper(this)" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                               
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required>                               
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_confirmation"  required>                                                              
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Nombre Completo</label>
                            <div class="col-md-6">
                                <input id="email" onfocusout="upper(this)" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-6">
                                <input id="email" onfocusout="upper(this)" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('RFC') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">RFC</label>
                            <div class="col-md-6">
                                <input id="RFC" onfocusout="upper(this)" type="text" class="form-control" name="RFC" value="{{ old('RFC') }}" required>

                                @if ($errors->has('RFC'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('RFC') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tel1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tel 1</label>
                            <div class="col-md-6">
                                <input id="tel1" type="tel" pattern="[0-9]*" class="form-control" name="tel1" value="{{ old('tel1') }}" pattern="[0-9]*" required="">

                                @if ($errors->has('tel1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel1') }}</strong>
                                    </span>
                                @endif                                
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="form-group{{ $errors->has('tel2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Tel 2</label>
                            <div class="col-md-6">
                                <input id="tel1" type="tel" class="form-control" name="tel2" value="{{ old('tel2') }}" pattern="[0-9]*">                                                               
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cel1') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cel 1</label>
                            <div class="col-md-6">
                                <input id="cel12" type="tel" class="form-control" name="cel1" value="{{ old('cel1') }}" pattern="[0-9]*">                                                          
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('cel2') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Cel 2</label>
                            <div class="col-md-6">
                                <input id="cel12" type="tel" class="form-control" name="cel2" value="{{ old('cel2') }}" pattern="[0-9]*">                                                          
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
<script>
    function upper(a){
        setTimeout(function(){
            a.value = a.value.toUpperCase();
        }, 1);
    }
</script>
@endsection
