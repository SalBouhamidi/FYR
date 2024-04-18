<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreimageRequest extends FormRequest
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
            'image'=> 'string | required',
            'propretie_id'=>'required'

        ];
    }
}
