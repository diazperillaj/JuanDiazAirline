@auth
    @can('verAerolineas')
        <style>
            .aerolineas_option{
                pointer-events: none;
                cursor: pointer;
                font-weight: bold;
                border-radius: 10px;
                background-color: #c0c0c0;
            }
        </style>
        @extends('layouts.app')
        @section('title', 'AEROLINEAS | JUAN DIAZ AIRLINES')

        @section('content')
            <div class="content">
                @if (count($aerolineas)===0)
                    <div class="table_no_count">
                        <h1>Ahora mismo no existen aerolineas.
                            @cannot('crearAerolineas')
                                Contacta a un administrador para que empiece la creación de las aerolineas
                            @endcannot
                        </h1>   
                    </div>
                @else
                    <div class="table__content">
                        <table>
                            <thead>
                                <tr>

                                    <th>ID Aerolinea</th>
                                    <th>Nombre</th>
                                    <th>Nit</th>
                                    @if(auth()->user()->can('editarAerolineas') or auth()->user()->can('eliminarAerolineas'))
                                        <th>#</th>
                                    @endif

                                </tr>
                            </thead>

                            <tbody>

                                @foreach($aerolineas as $aerolinea)
                                    <tr>

                                        <td><a href="{{ route('vuelos.show', [$aerolinea->id]) }}">{{ $aerolinea->id }}</a></td>
                                        <td>{{ $aerolinea->nombre }}</td>
                                        <td>{{ $aerolinea->nit }}</td>
                                        @if(auth()->user()->can('editarAerolineas') or auth()->user()->can('eliminarAerolineas'))
                                            <td class="table_actions">
                                                @can('editarAerolineas')
                                                    <a class="table_edit_action" href="{{ route('aerolineas.edit', [$aerolinea->id]) }}">EDITAR</a>
                                                @endcan
                                                @can('eliminarAerolineas')
                                                    <a class="table_delete_action" href="{{ route('aerolineas.delete', [$aerolinea->id]) }}">ELIMINAR</a>
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

            @can('crearAerolineas')
                <section class="modal" id="modal">
                    <div class="modal__container">
                        <form action="{{ route('aerolineas.store') }}" method="POST" class="modal_form">
                            @csrf
                            <h2 class="modal_form__title">Crear Aerolínea</h2>
                            <div class="modal_form__group">
                                <label class="modal_form__label">Nombre Aerolínea</label>
                                <input type="text" name="nombre" class="modal_form__input">
                            </div>
                            <div class="modal_form__group">
                                <label class="modal_form__label">Nit Aerolínea</label>
                                <input type="number" name="nit" class="modal_form__input">
                            </div>
                            <input type="submit" value="Registrar Aerolínea" class="modal_form__submit">
                        </form>
                        <button class="modal_form__cancel" id="close_modal_btn">Volver</button>
                    </div>
                </section>
            @endcan
            <script src="{{ asset('js/modal.js') }}"></script>
        @endsection
    @endcan
@endauth