<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'cover_path'=>['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], 
            'title'=>['required', 'string', 'max:50'], 
            'author'=>['required', 'string', 'max:50'],
            'genres'=>['required', 'string'],
            'total_pages'=>['required', 'integer', 'min:1'],
            'first_publish'=>['required', 'date'], 
            'synopsis'=>['nullable', 'string']
        ];
    }
}
