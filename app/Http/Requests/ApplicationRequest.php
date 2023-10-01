<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dealer_id'     => 'required|integer',
            'amount'        => 'required|numeric',
            'term'          => 'required|integer',
            'interest_rate' => 'required|numeric',
            'reason'        => 'required|string',
            'status'        => 'required|string',
            'bank_id'       => 'required|integer',
        ];
    }
}
