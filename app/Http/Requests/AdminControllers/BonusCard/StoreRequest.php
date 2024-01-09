<?php

namespace App\Http\Requests\AdminApi\BonusCard;

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
            'free_spins' => ['nullable'],
            'title' => ['required', 'max:70'],
            'slug' => ['required', 'max:70'],
            'description'  => ['nullable'],
            'bonus_code' => ['required'],
            'wagering' => ['required'],
            'refferal_link' => ['required'],
            'expired_date' => ['required']  
        ];
    }
}
