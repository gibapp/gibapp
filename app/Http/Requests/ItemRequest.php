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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
public function rules(): array
{
    return [
        'item_name' => 'required|string|min:10',
        'description' => 'required|string',
        'finder_name' => 'required|string',
        'image' => 'required|image', // Assuming 'image' is a file upload and should be an image file.
        'category_id' => 'required|exists:categories,id', // Assuming 'category_id' exists in the 'categories' table.
        'found_location' => 'required|string',
    ];
}

}
