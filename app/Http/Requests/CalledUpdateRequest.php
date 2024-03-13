<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CalledUpdateRequest extends FormRequest
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
            'assigned_user_uuid' => 'required|exists:users,uuid',
            'status' => 'required|string',
        ];
    }
    protected function prepareForValidation()
    {
        $uuidUserAssigned = Auth::user()->getAuthIdentifier();
        $this->merge([
            'assigned_user_uuid' => $uuidUserAssigned,
            'status' => 'Assigned',
        ]);


    }
}
