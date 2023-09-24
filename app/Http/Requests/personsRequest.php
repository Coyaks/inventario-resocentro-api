<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class personsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => 'required',
            'surname' => 'required',
            'person_age'  => 'required',
            'email'  => 'required',
            'phone'  => 'required',
            'gender'  => 'nullable|date',
            'id_type_person'  => 'nullable|date',
            'state'  => 'required',
            'id_user'  => '',
        ];

    }
}
