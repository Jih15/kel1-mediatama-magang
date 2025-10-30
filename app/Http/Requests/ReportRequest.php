<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'in:income,expense',
            'category_id' => 'exists:categories,category_id',
            'userid' => 'exists:users,user_id',
            'month' => 'integer|between:1,12',
            'year' => 'integer|min:1900|max:2100',
        ];
    }
}
