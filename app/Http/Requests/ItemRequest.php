<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'item_name' => 'required|string|min:2|max:255',
            'description' => 'required|string|max:255',
            'finders_name' => 'required|string|max80',
            'found_location' => 'required|string|min:4|max:30'
        ];
    }
}
