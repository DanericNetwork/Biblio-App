<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FineRequest extends FormRequest
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
            'grant_id' => 'required|integer|exists:grants,id',
            'amount' => 'required|decimal:1,2',
        ];
    }
}
