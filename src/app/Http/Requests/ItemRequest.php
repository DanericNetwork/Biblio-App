<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ItemRequest extends FormRequest
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
            'type' => 'required|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'category' => 'required|integer|exists:item_categories,id',
            'rating' => 'required|integer|exists:item_age_ratings,id',
            'borrowing_time' => 'nullable|integer',
            'ISBN' => 'nullable|string|unique:items,ISBN',
        ];
    }
}
