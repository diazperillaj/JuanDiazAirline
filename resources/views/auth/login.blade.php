@extends('layouts.app')
@section('title', 'Inicio de Sesión')


@section('content')

    @if (session('success'))
        <script>window.alert("{{session('success')}}")</script>
    @endif
    @if ($errors->any())
        <div class="form__error">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    <div class="container">

        <form action="{{ route('ingreso.store') }}" method="post">
            @csrf

            <h2 class="form__title">Iniciar Sesión</h2>

            <div class="form__group">
                <label class="form__label">Correo Electrónico / Usuario</label>
                <input type="text" name="username" class="form__input">
            </div>
            
            <div class="form__group">
                <label class="form__label">Contraseña</label>
                <input type="password" name="password" class="form__input">
            </div>

            <p>¿No tienes una cuenta? <a href="{{ route('registro.show') }}">Registrarse</a></p>
            <input class="form__submit" type="submit" value="Ingresar">

        </form>
    </div>

@endsection