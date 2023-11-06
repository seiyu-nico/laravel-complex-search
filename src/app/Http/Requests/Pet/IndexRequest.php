<?php

namespace App\Http\Requests\Pet;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'name|like' => ['nullable', 'string', 'max:255'],
            'size|in' => ['nullable', 'array'],
            'size|in.*' => ['integer', 'min:0', 'max:2'],
            'price|between' => ['array'],
            'price|between.min' => ['nullable', 'integer', 'min:0'],
            'price|between.max' => ['nullable', 'integer', 'max:100000'],
            'age' => ['nullable', 'integer', 'min:0', 'max:15'],
        ];
    }
}
