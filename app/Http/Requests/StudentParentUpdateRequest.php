<?php

namespace App\Http\Requests;

class StudentParentUpdateRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|between:3,100',
            'email' => 'required|max:120|email|unique:student_parents,email,' . $this->parent->id,
            'birthdate' => 'required|date_format:Y-m-d',
            'phone' => 'required|numeric|digits:14',
            'address' => 'required|string|between:8,100',
        ];
    }
}
