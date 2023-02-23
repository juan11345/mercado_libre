<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize(){
        return true;
    }


    public function rules(){
        return [
            "name" => ['required','string'],
			"last_name" => ['required','string'],
			"email" => ['required','email', "unique:users,email,{$this->user->id}"],
			"password" => ['nullable','string', 'min:8', 'confirmed'],
			"role" => ['required']
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El nombre es requerido',
			'name.string' => 'El nombre no es valido',

			'last_name.required' => 'El apellido es requerido',
			'last_name.string' => 'El apellido no es valido',

			'email.required' => 'El correo es requerido',
			'email.email' => 'El correo debe de ser valido',
			'email.unique' => 'El correo ya fue tomado',

			'password.string' => 'La contraseña debe ser valida',
			'password.min' => 'La contraseña es muy corta (min 8)',
			'password.confirmed' => 'La contraseña no coincide',
        ];
    }
}
