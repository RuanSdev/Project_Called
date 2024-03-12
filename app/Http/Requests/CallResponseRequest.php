<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CallResponseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'response' => 'required',
            'user_uuid' => 'required|exists:users,uuid',
            'called_uuid' =>'required|exists:calleds,uuid',
        ];
    }
    public function prepareForValidation()
    {
        $uuidUserAuth =  Auth::user()->getAuthIdentifier();
        $this->merge([
            'user_uuid' => $uuidUserAuth,
        ]);
    }
}
