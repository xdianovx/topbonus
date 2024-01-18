<?php

namespace App\Http\Requests\AdminControllers\BonusCard;

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
            'description'  => ['nullable'],
            'bonus_code' => ['required'],
            'wagering' => ['required'],
            'refferal_link' => ['required'],
            'expired_date' => ['required','date'],
            'max_cash_out' => ['required','integer','max:999999999'],
            'category_id' => 'required|string',
            'casino_id' => 'required|string',
            'bonus_type_id' => 'required|string',
            'countries' => 'nullable|array',
            'countries.*' => 'nullable|string|exists:countries,title',
            'game_types' => 'nullable|array',
            'game_types.*' => 'nullable|string|exists:game_types,title',
            'games' => 'nullable|array',
            'games.*' => 'nullable|string|exists:games,title',
        ];
    }
}
