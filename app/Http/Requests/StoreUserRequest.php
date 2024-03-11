<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            User::NAME_ATTRIBUTE => ['required', 'string', 'max:255'],
            User::PHONE_ATTRIBUTE => ['required', 'integer', 'unique:users,phone', 'digits:10'],
        ];
    }
}
