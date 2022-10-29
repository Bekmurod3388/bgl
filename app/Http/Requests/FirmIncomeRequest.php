<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FirmIncomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firm_id' => "required",
            'car_number' => "required",
            'brutto' => "required",
            'tara' => "required",
            'price' => "required",
            'date' => "required",
        ];
    }
}
