@auth
    @can('verVuelos')
        <style>
            .vuelos_option{
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
                @if (count($vuelos)===0)
                    <div class="table_no_count">
                        <h1>Ahora mismo no existen vuelos.
                            @cannot('crearAerolineas')
                                Contacta a un administrador para que empiece la creación de los vuelos
                            @endcannot
                            @can('crearAerolineas')
                                Para la creación de un vuelo se debe tener una aerolinea, seguido darle click en el id que registra en la tabla y después llenar el formulario
                            @endcan
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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($vuelos as $vuelo)
                                    <tr>

                                        <td>{{ ucwords($vuelo->ciudad_partida) }}</td>
                                        <td>{{ ucwords($vuelo->ciudad_destino) }}</td>
                                        <td>{{ $vuelo->numero_pasajero }}</td>
                                        @if ($vuelo->novedad_vuelo)
                                            <td>{{ $vuelo->novedad_vuelo }}</td>
                                        @else
                                            <td>No hay novedad</td>
                                        @endif
                                        <td>{{ $vuelo->fecha_partida }}</td>
                                        <td>{{ $vuelo->fecha_llegada }}</td>
                                        <td><a href="{{ route('vuelos.show', [$vuelo->jdaerolinea_id]) }}">{{ ucwords($vuelo->aerolinea_nombre) }}</a></td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        @endsection
    @else
        @section('title', 'No tienes permiso')
        <script>window.location = "{{ route('ingreso.show') }}";</script>
    @endcan
@endauth