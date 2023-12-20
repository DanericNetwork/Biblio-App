<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'item_id' => 'required|integer|exists:items,id',
            'borrowed_date' => 'required|date',
            'return_date' => 'nullable|date',
        ];
    }
}
