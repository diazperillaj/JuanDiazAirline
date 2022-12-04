<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use SebastianBergmann\Type\TrueType;

class RegisterRequest extends FormRequest
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
            'register_name' => 'required|min:4|max:20',
            'register_email' => 'required|email|unique:users,email',
            'register_username' => 'required|min:4|max:30|unique:users,username',
            'register_password' => 'required|min:4',
            'register_confirm_password' => 'required|same:register_password',
            'register_select' => 'required|numeric'
        ];
    }

    public function getRolName($id)
    {
        $rol = Role::find($id);
        return ['rolName' => $rol->name];
    }
}
