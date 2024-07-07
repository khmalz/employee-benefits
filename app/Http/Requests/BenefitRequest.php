<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BenefitRequest extends FormRequest
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
            'employee_id' => ['required', 'numeric'],
            'employee_nik' => ['required', 'string', 'max:20', 'alpha_dash'],
            'type' => ['required', 'string', Rule::in(['kesehatan', 'bencana', 'transportasi', 'jabatan', 'makanan'])],
            'amount' => ['required', 'string', 'max:30', 'regex:/^[\d.,]+$/'],
            'message' => ['required', 'string', 'max:100'],
            'file' => [Rule::requiredIf(is_null($this->benefit_id)), 'file', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}
