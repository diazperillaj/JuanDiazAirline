<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VueloRequest extends FormRequest
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
            'ciudad_partida' => 'required',
            'ciudad_destino' => 'required',
            'numero_pasajero' => 'required|numeric',
            'fecha_partida' => 'required|date',
            'fecha_llegada' => 'required|date'
        ];
    }

    public function attributes()
    {
        return [
            'ciudad_partida' => 'lugar de salida',
            'ciudad_destino' => 'lugar de Llegada',
            'numero_pasajero' => 'número de pasajeros',
            'fecha_partida' => 'fecha de salida',
            'fecha_llegada' => 'fecha de llegada'
        ];
    }
}
