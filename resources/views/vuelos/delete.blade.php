@auth
    @can('eliminarVuelos')
        @extends('layouts.app')
        @section('title', 'Confirmar Eliminación')

        @section('content')

            <div class="content">
                <div class="confirm_delete_container">
                    <h2>Seguro que desea eliminar el vuelo? La acción es irreversible</h2>
                    <form action="{{ route('vuelos.destroy', [$id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <input type="submit" value="CONFIRMAR" class="confirm_delete__button">

                    </form>
                </div>
            </div>

        @endsection
    @else
        @section('title', 'No tienes permiso')
        <script>window.location = "{{ route('ingreso.show') }}";</script>
    @endcan
@endauth
