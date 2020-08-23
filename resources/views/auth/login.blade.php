@extends('layouts.app')

@section('content')
{{-- <div class="login-area">
    <div class="bg-image">
        <div class="login-signup">
            <div class="container">
                <div class="login-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="login-details">
                                <ul class="nav nav-tabs navbar-right">
                                    <li><a data-toggle="tab" href="#register">Registro</a></li>
                                    <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Regsitro --}}


                {{-- <div class="tab-content">
                    <div id="register" class="tab-pane active">
                        <div class="col-md-4 col-md-offset-4">
                            <div class="login-form">
                                {{-- @include('error') --}}
                                {{-- <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1 class="panel-title">Registrate</h1>
                                    </div>
                                    <div class="panel-body">
                                    <form action="{{url('/registrar')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="name">Nombre</label>
                                            <input class="form-control" type="text" name="name" placeholder=" Escribe tu Nombre" id="name">

                                            <label for="email">Email</label>
                                            <input class="form-control" type="email" name="email" placeholder="Ejemplo@web.com" id="email">

                                            <label for="password">Contraseña</label>
                                            <input class="form-control" type="password" name="password" placeholder=" Escribe tu Contraseña" id="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block" >Registrar</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> --}}


                {{-- login --}}

                  {{-- <div id="login" class="tab-pane fade in ">
                    <div class="login-inner">
                        <div class="title"> --}}
                            {{-- <h1>Bienvenido</h1> --}}
                            <div class="row">
                                <div id="login" class="col-md-4 col-md-offset-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h1 class="panel-title">Acceso a la aplicación</h1>
                                        </div>
                                        <div class="panel-body">
                                            <form method="POST" action="{{route('login')}}">
                                                {{csrf_field()}}
                                                <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                                    <label for="email">Email</label>
                                                    <input class="form-control" type="email" name="email" placeholder="Ingresa tu email" />
                                                {!! $errors->first('email','<span class= "help-block">:message</span>')!!}
                                                </div>
                                                <div  class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" placeholder="Ingresa tu contraseña" />
                                                    {!! $errors ->first('password','<span class= "help-block">:message</span>')!!}
                                                </div>
                                                <div>
                                                    {!! $errors ->first('sesion','<span class= "help-block">:message</span>')!!}
                                                </div>
                                                <button class="btn btn-primary btn-block">Accede</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
            
                              </div>

{{-- 
                        </div>
                   
                    </div>
                </div> --}}
                {{-- </div>
            </div>
        </div>
    </div>
</div> --}}
 

@endsection