<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        if(Auth::check()){
            return redirect()->route('aerolineas.index');
        }
        return view('auth.register', [
            'roles' => Role::all()
        ]);
    }

    public function store(RegisterRequest $request)
    {
        User::create([
            'name' => $request->register_name,
            'email' => $request->register_email,
            'username' => $request->register_username,
            'password' => $request->register_password
        ])->assignRole($request->getRolName($request->register_select));

        return redirect()->route('ingreso.show')->with('success','Se ha creado el usuario correctamente, por favor inicie sesión');
    }
}
