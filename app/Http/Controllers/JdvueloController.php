<?php

namespace App\Http\Controllers;

use App\Http\Requests\VueloRequest;
use App\Http\Requests\VuelosEditRequest;
use App\Models\Jdaerolinea;
use App\Models\Jdvuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JdvueloController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('vuelos.index', ['vuelos' => DB::table('jdvuelos')
                ->join('jdaerolineas', 'jdvuelos.jdaerolinea_id', '=', 'jdaerolineas.id')
                ->select('jdvuelos.*', 'jdaerolineas.nombre as aerolinea_nombre')
                ->get()]);
        }
    }

    public function show($id)
    {
        if(Auth::check()){
            $aero=Jdaerolinea::find($id);
            return view('vuelos.show', ['vuelos' => $aero->jdvuelos, 'nombre' => $aero->nombre, 'id' => $id]);
        }
        return redirect()->route('ingreso.show');
    }

    public function store(VueloRequest $request, $id)
    {
        if(Auth::check()){
            Jdvuelo::create([
                'ciudad_partida' => $request->ciudad_partida,
                'ciudad_destino' => $request->ciudad_destino,
                'numero_pasajero' => $request->numero_pasajero,
                'novedad_vuelo' => $request->novedad_vuelo,
                'fecha_partida' => $request->fecha_partida,
                'fecha_llegada' => $request->fecha_llegada,
                'jdaerolinea_id' => $id
            ]);
            return redirect()->route('vuelos.show', [$id]);
        }
        return redirect()->route('ingreso.show');
    }

    public function update($id)
    {
        if(Auth::check()){
            return view('vuelos.update', ['vuelo' => Jdvuelo::find($id)]);
        }
        return redirect()->route('ingreso.show');
    }

    public function edit(VuelosEditRequest $request, $id)
    {
        if(Auth::check()){
            $edit = Jdvuelo::find($id);
            $edit->ciudad_partida = $request->ciudad_partida;
            $edit->ciudad_destino = $request->ciudad_destino;
            $edit->numero_pasajero = $request->numero_pasajero;
            $edit->novedad_vuelo = $request->novedad_vuelo;
            $edit->fecha_partida = $request->fecha_partida;
            $edit->fecha_llegada = $request->fecha_llegada;
            $edit->save();

            return redirect()->route('vuelos.show', [$edit->jdaerolinea_id])->with('success', 'Se ha editado correctamente el vuelo');
        }
        return redirect()->route('ingreso.show');
    }

    public function delete($id)
    {
        if(Auth::check()){
            return view('vuelos.delete', ['id' => $id]);
        }
        return redirect()->route('ingreso.show');
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $aero = Jdvuelo::find($id);
            $aeroid = $aero->jdaerolinea_id;
            $aero->delete();
            return redirect()->route('vuelos.show', [$aeroid])->with('success', 'Se ha eliminado corractamente la aerolinea');
        }
        return redirect()->route('ingreso.show');
    }

}
