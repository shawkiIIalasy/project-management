<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => ['required', 'min:6', 'max:255'],
            'last_name' => ['required', 'min:6', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users,email,' . $this->id],
            'password' => ['required', 'min:6', 'max:255'],
            'department_id' => ['required']
        ];
    }

}
