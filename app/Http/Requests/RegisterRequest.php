<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    protected function prepareForValidation() {
        $this->merge([ // método  modifica los datos de la solicitud antes de que se validen
            'id_rol' => 2 // Asignamos el rol "bajo" automáticamente

        ]);
        }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'username' => 'required|min:3',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'password' => 'required|min:3',
            'password_confirmation' => 'required|same:password',
            'id_rol' => 'exists:roles,id',
            /* 'name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password' */
        ];
    }
}
