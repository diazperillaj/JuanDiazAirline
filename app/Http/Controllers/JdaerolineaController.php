<?php

namespace App\Http\Controllers;

use App\Http\Requests\JdaerolineaRequest;
use App\Http\Requests\updateAerolineaRequest;
use App\Models\Jdaerolinea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JdaerolineaController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('aerolinea.index', ['aerolineas' => Jdaerolinea::all()]);
        }
        return redirect()->route('ingreso.show');
    }

    public function store(JdaerolineaRequest $request)
    {
        if(Auth::check()){
            Jdaerolinea::create($request->validated());
            return redirect()->route('aerolineas.index')->with('success','Se ha creado correctamente la aerolinea!');
        }
        return redirect()->route('ingreso.show');
    }

    public function update($id){
        if(Auth::check()){
            return view('aerolinea.edit', ['aero' => Jdaerolinea::find($id)]);
        }
        return redirect()->route('ingreso.show');
    }

    public function edit(updateAerolineaRequest $request, $id){
        if(Auth::check()){
            $upd = Jdaerolinea::find($id);
            $upd->nombre=$request->nombre;
            $upd->nit=$request->nit;
            $upd->save();
            return redirect()->route('aerolineas.index')->with('success', 'Se ha actualizado con exito!');
        }
        return redirect()->route('ingreso.show');
    }

    public function delete($id)
    {
        if(Auth::check()){
            return view('aerolinea.delete', ['id' => $id]);
        }
        return redirect()->route('ingreso.show');
    }

    public function destroy($id)
    {
        if(Auth::check()){
            $aero = Jdaerolinea::find($id);
            $aero->delete();
            return redirect()->route('aerolineas.index')->with('success', 'Se ha eliminado corractamente la aerolinea');
        }
        return redirect()->route('ingreso.show');
    }

}
