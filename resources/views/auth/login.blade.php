@extends('layouts.login')

@section('content')
<br><br>
<div class=" bordes">
    <div class="row">
        <div class=" white">
            <div class="panel panel-default">
                <div class="panel-heading grey lighten-2"><h5 id='accesarTittle'>Accesar <i class="material-icons left">lock</i></h5></div>
                <div class="container">
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="input-field{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electronico E-mail</label>                            
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif                            
                        </div>

                        <div class="input-field{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>                            
                            <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif                            
                        </div>

                        
                                                            
                        <p>
                            <input type="checkbox" id="test5" />
                            <label for="test5">Mantener </label>
                        </p>
                        
                        <br>
                            
                        <button type="submit" class="btn waves-effect blue">
                            Iniciar sesión<i class="material-icons right">send</i>
                        </button>

<!--                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>-->
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
