<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDataStoreRequest extends FormRequest
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
            'name'      => ['required'],
            'email'     => ['required', 'email'],
            'phone'     => ['required', Rule::unique('user_infos', 'phone')],
            'category_id'=> ['required']
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Category is required',
        ];
    }
}
