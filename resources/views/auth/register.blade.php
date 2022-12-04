@extends('layouts.app')
@section('title', 'Inicio de Sesión')


@section('content')

    @if ($errors->any())
        <div class="form__error">
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    <div class="container">
        
        <form action="{{ route('registro.store') }}" method="post">
            @csrf

            <h2 class="form__title">Registro</h2>

            
            <div class="form__group">
                <label class="form__label">Nombre</label>
                <input type="text" name="register_name" class="form__input">
            </div>

            <div class="form__group">
                <label class="form__label">Correo Electrónico</label>
                <input type="email" name="register_email" class="form__input">
            </div>

            <div class="form__group">
                <label class="form__label">Usuario</label>
                <input type="text" name="register_username" class="form__input">
            </div>
            
            <div class="form__group">
                <label class="form__label">Contraseña</label>
                <input type="password" name="register_password" class="form__input">
            </div>

            <div class="form__group">
                <label class="form__label">Confirmar Contraseña</label>
                <input type="password" name="register_confirm_password" class="form__input">
            </div>

            <div class="form__group">
                <label>Rol</label>
                <select name="register_select" class="form__select">
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <p>¿Ya tienes una cuenta? <a href="{{ route('ingreso.show') }}">Inicia Sesión</a></p>
            <input class="form__submit" type="submit" value="Registrarse">

        </form>
    </div>
@endsection