<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
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
            'old_password'=>[
                'required',
                function ($attribute, $value, $fail){
                    if (!Hash::check($value, $this->user()->password )){
                        $fail('tu contraseña no coincide');
                    }
                }
            ],
            'password'=> 'required|string|min:6|confirmed'
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'este campo es requerido',
            'password.string'=>'El valor no es correcto',
            'password.min'=>'Tu contraseña debe tener al menos 6 caracteres',
            'password.confirmed'=>'las contraseñas no coiciden',
        ];
    }
}
