<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VuelosEditRequest extends FormRequest
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
            'numero_pasajero' => 'numeric',
            'fecha_partida' => 'date',
            'fecha_llegada' => 'date'
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
