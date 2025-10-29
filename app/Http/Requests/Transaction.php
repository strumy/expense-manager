<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Transaction extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required|in:expense,income',
            'amount' => 'required|numeric|min:0',
            'date_of_transaction' => 'required|date',
            'status' => 'required|in:enabled,disabled',
            'user_id' => 'required|exists:users,id'
        ];
    }
}
