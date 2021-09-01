<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:6', 'max:255', 'unique:departments'],
            'description' => ['required', 'min:50', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "name is required",
            "description.required" => "description is required"
        ];
    }
}
