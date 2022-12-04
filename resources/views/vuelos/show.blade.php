@auth()
    @can('verVuelos')
        @extends('layouts.app')

        @section('title', 'AEROLINEAS | JUAN DIAZ AIRLINES')



        @section('content')

            <div class="content">
                @if (count($vuelos)===0)
                    <div class="table_no_count">
                        <h1>Ahora mismo no existen vuelos.
                            @cannot('crearVuelos')
                                Contacta a un administrador para que empiece la creación de los vuelos
                            @endcannot

                        </h1>
                        
                    </div>
                @else
                    <div class="table__content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ciudad Partida</th>
                                    <th>Ciudad Destino</th>
                                    <th>Número Pasajeros</th>
                                    <th>Novedad</th>
                                    <th>Fecha Partida</th>
                                    <th>Fecha Llegada</th>
                                    <th>Aerolinea</th>
                                    @if(auth()->user()->can('editarVuelos') or auth()->user()->can('eliminarVuelos'))
                                        <th>#</th>
                                    @endif
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($vuelos as $vuelo)
                                    <tr>
                                        <td>{{ $vuelo->ciudad_partida }}</td>
                                        <td>{{ $vuelo->ciudad_destino }}</td>
                                        <td>{{ $vuelo->numero_pasajero }}</td>
                                        @if ($vuelo->novedad_vuelo)
                                            <td>{{ $vuelo->novedad_vuelo }}</td>
                                        @else
                                            <td>No hay novedad</td>
                                        @endif
                                        <td>{{ date('d-m-Y g:i:s A', strtotime($vuelo->fecha_partida)) }}</td>
                                        <td>{{ date('d-m-Y g:i:s A', strtotime($vuelo->fecha_llegada)) }}</td>
                                        <td>{{ $nombre }}</td>
                                        @if(auth()->user()->can('editarVuelos') or auth()->user()->can('eliminarVuelos'))
                                            <td>
                                                @can('editarVuelos')
                                                    <a class="table_edit_action" href="{{ route('vuelos.update', [$vuelo->id]) }}">EDITAR</a>
                                                @endcan
                                                @can('eliminarVuelos')
                                                    <a class="table_delete_action" href="{{ route('vuelos.delete', [$vuelo->id]) }}">ELIMINAR</a>
                                                @endcan
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            @can('crearVuelos')
                <section class="modal vuelos_modal" id="modal">
                    <div class="modal__container vuelos_modal_container">
                        <h2 class="modal_form__title">Crear Vuelo</h2>
                        <form action="{{ route('vuelos.store', [$id]) }}" method="post" class="modal_form create_vuelos_modal">
                            @csrf

                            <div class="vuelos_form__modal" id="vuelos_salida">
                                <label for="" class="vuelos_form__label">Lugar de Salida *</label>
                                <input type="text" name="ciudad_partida" class="vuelos_form__input">
                            </div>

                            <div class="vuelos_form__modal"  id="vuelos_destino">
                                <label for="" class="vuelos_form__label">Lugar de Llegada *</label>
                                <input type="text" name="ciudad_destino" class="vuelos_form__input">
                            </div>

                            <div class="vuelos_form__modal" id="vuelos_pasajeros">
                                <label for="" class="vuelos_form__label">Número de Pasajeros *</label>
                                <input type="number" name="numero_pasajero" class="vuelos_form__input">
                            </div>

                            <div class="vuelos_form__modal" id="vuelos_novedad">
                                <label for="" class="vuelos_form__label">Novedad</label>
                                <input type="text" name="novedad_vuelo" class="vuelos_form__input" placeholder="En caso de no tener novedad, dejar vacío.">
                            </div>

                            <div class="vuelos_form__modal" id="vuelos_fecha_salida">
                                <label for="" class="vuelos_form__label" id="salida_fecha">Fecha de Salida *</label>
                                <input type="datetime-local" name="fecha_partida" class="vuelos_form__input">
                            </div>

                            <div class="vuelos_form__modal" id="vuelos_fecha_llegada">
                                <label for="" class="vuelos_form__label">Fecha de Llegada *</label>
                                <input type="datetime-local" name="fecha_llegada" class="vuelos_form__input">
                            </div>

                            <div class="vuelos_form_options">
                                <input type="submit" value="Subir Vuelo" class="vuelos_form__submit">
                                <button type="button" class="vuelos_form__cancel" id="close_modal_btn">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </section>
                <script src="{{ asset('js/modal.js') }}"></script>
            @endcan
        @endsection
    @else
        @section('title', 'No tienes permiso')
        <script>window.location = "{{ route('ingreso.show') }}";</script>
    @endcan
@endauth