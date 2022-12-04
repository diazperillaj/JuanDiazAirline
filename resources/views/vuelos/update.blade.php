@auth
    @can('editarVuelos')
        
    
        @extends('layouts.app')

        @section('title', 'Editar Vuelo')

        <script>
            function regresar(){    
                window.location = "{{ route('vuelos.show', [$vuelo->jdaerolinea_id]) }}"
            }
        </script>

        
        @section('content')
            <div class="content edit_vuelo_content">
                <form action="{{ route('vuelos.edit', [$vuelo->id]) }}" method="post" class="modal_form create_vuelos_modal">
                    @csrf
                    @method('PATCH')

                    <div class="vuelos_form__modal" id="vuelos_salida">
                        <label for="" class="vuelos_form__label">Lugar de Salida *</label>
                        <input type="text" name="ciudad_partida" class="vuelos_form__input" value="{{ $vuelo->ciudad_partida }}">
                    </div>

                    <div class="vuelos_form__modal"  id="vuelos_destino">
                        <label for="" class="vuelos_form__label">Lugar de Llegada *</label>
                        <input type="text" name="ciudad_destino" class="vuelos_form__input" value="{{ $vuelo->ciudad_destino }}">
                    </div>

                    <div class="vuelos_form__modal" id="vuelos_pasajeros">
                        <label for="" class="vuelos_form__label">Número de Pasajeros *</label>
                        <input type="number" name="numero_pasajero" class="vuelos_form__input" value="{{ $vuelo->numero_pasajero }}">
                    </div>

                    <div class="vuelos_form__modal" id="vuelos_novedad">
                        <label for="" class="vuelos_form__label">Novedad</label>
                        <input type="text" name="novedad_vuelo" class="vuelos_form__input" value="{{ $vuelo->novedad_vuelo }}" placeholder="En caso de no tener novedad, dejar vacío.">
                    </div>

                    <div class="vuelos_form__modal" id="vuelos_fecha_salida">
                        <label for="" class="vuelos_form__label" id="salida_fecha">Fecha de Salida *</label>
                        <input type="datetime-local" name="fecha_partida" class="vuelos_form__input" value="{{ $vuelo->fecha_partida }}">
                    </div>

                    <div class="vuelos_form__modal" id="vuelos_fecha_llegada">
                        <label for="" class="vuelos_form__label">Fecha de Llegada *</label>
                        <input type="datetime-local" name="fecha_llegada" class="vuelos_form__input" value="{{ $vuelo->fecha_llegada }}">
                    </div>

                    <div class="vuelos_form_options">
                        <input type="submit" value="Subir Vuelo" class="vuelos_form__submit">
                        <button type="button" onclick="regresar()" class="vuelos_form__cancel" id="close_modal_btn">Cancelar</button>
                    </div>
                </form>
            </div>
        @endsection
    @else
        @section('title', 'No tienes permiso')
        <script>window.location = "{{ route('ingreso.show') }}";</script>
    @endcan    
@endauth