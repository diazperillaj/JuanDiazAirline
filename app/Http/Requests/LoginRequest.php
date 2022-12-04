<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|min:4',
            'password' => 'required'
        ];
    }

    public function getCredentials()
    {
        $username = $this->get('username');
        if($this->isEmail($username)){
            return [
                'email' => $username,
                'password' => $this->get('password')
            ];
        }
        return $this->only('username','password');
    }

    public function isEmail($value)
    {
        $factory = $this->container->make(ValidationFactory::class);

        /* Se realiza una validación de si es correo electrónico mediante la siguiente función, la cual en caso de que
        el valor ingresado no sea un email, devuelve un valor true pero como en el return se está haciendo lo contrario
        "!" va a devolver un valor false */

        return !$factory->make(['username' => $value], ['username' => 'email'])->fails();
    }
}
