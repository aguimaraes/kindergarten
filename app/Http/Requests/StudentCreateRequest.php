<?php

namespace App\Http\Requests;

class StudentCreateRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_parent_id' => 'required|integer|exists:student_parents,id',
            'name' => 'required|string|between:3,100',
            'email' => 'required|max:120|email|unique:students',
            'birthdate' => 'required|date_format:Y-m-d',
            'phone' => 'required|numeric|digits:14',
            'address' => 'required|string|between:8,100',
        ];
    }
}
