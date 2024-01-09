<?php

namespace App\Http\Requests\AdminApi\GameType;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'live' => ['required'],
            'icon' => 'required|image',
            'description'  => ['nullable']
        ];
    }
}
