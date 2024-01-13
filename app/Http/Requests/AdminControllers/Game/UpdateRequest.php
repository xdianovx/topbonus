<?php

namespace App\Http\Requests\AdminControllers\Game;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'max:70'],
            'slug' => ['required', 'max:70'],
            'game_type_id' => ['required','string'],
            'image' => 'required|image',
            'description'  => ['nullable']
        ];
    }
}
