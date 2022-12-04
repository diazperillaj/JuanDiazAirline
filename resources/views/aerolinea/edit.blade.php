@auth
    @can('editarAerolineas')
        @extends('layouts.app')

        @section('title', 'Editar Aerolínea')

        @section('content')
        
            <div class="content">
                <div class="modal__container form_edit">
                    <form action="{{ route('aerolineas.edit', [$aero->id]) }}" method="POST" class="modal_form ">
                        @csrf
                        @method('PATCH')
                        <h2 class="modal_form__title">Editar Aerolínea</h2>
                        <div class="modal_form__group">
                            <label class="modal_form__label">Nombre Aerolínea</label>
                            <input type="text" name="nombre" class="modal_form__input" value="{{ $aero->nombre }}">
                        </div>
                        <div class="modal_form__group">
                            <label class="modal_form__label">Nit Aerolínea</label>
                            <input type="number" name="nit" class="modal_form__input" value="{{ $aero->nit }}">
                        </div>
                        <input type="submit" value="Registrar Aerolínea" class="modal_form__submit">
                    </form>
                </div>
            </div>
        @endsection
    @else
        <script>window.location = "{{ route('ingreso.show') }}";</script>
    @endcan
    
@endauth