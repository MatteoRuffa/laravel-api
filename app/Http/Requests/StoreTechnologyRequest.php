<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|max:200',
            'color' => 'required|string|size:7',
            'icon' => 'required|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Field attribute is needed.',
            'title.max' => 'Field attribute should not have more than 200 characters.',
            'color.required' => 'Il campo colore è obbligatorio.',
            'color.size' => 'Field attribute should have exactly 7 characters.',
            'icon.required' => 'Field attribute is needed.',
            'icon.max' => 'Field attribute should not have more than 100 characters.',
            
        ];
    }
}
