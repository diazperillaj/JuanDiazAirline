<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if(Auth::check()){
        return redirect()->route('aerolineas.index');
        }
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::validate($credentials)){
            return redirect()->route('ingreso.show')->withErrors('No se ha podido iniciar sesión, por favor verifique sus datos y vuelva a intentar.');
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);
        
        return $this->authenticated($request, $user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect()->route('aerolineas.index');
    }
}
