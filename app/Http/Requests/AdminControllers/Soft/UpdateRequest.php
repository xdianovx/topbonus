<?php

namespace App\Http\Requests\AdminControllers\Soft;

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
            'link' => ['required'],
            'logo' => 'nullable|image',
            'casino_id' => 'required|string',
            'description'  => ['nullable'],
            'description_footer' => ['nullable']
        ];
    }
}
