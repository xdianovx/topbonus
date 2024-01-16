<?php

namespace App\Http\Requests\AdminControllers\Casino;

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
            'link' => ['required'],
            'logo' => 'nullable|image',
            'description'  => ['nullable'],
            'description_footer' => ['nullable'],
            'license_id' => 'required|string',
            'certificate_id' => 'required|string',
            'countries' => 'nullable|array',
            'countries.*' => 'nullable|string|exists:countries,title',
            'game_types' => 'nullable|array',
            'game_types.*' => 'nullable|string|exists:game_types,title',
        ];
    }
}
