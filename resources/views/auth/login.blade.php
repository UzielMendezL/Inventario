@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-defautl">
            <div class="panel-heading">
                <h1 class="panel-title">Acceso a la aplicación</h1>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{route('login')}}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Ingresa tu email" />

                        <label for="pass">Password</label>
                        <input type="password" name="pass" placeholder="Ingresa tu contraseña" />

                        <button class="btn btn-primary btn-block">Accede</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection