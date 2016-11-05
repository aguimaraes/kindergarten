<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        if (!$user) {
            return false;
        }
        $this->getInputSource()->set('user_id', $user->id);
        return true;
    }
}
