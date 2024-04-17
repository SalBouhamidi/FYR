<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepropretieRequest extends FormRequest
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
            'name'=> 'required|string',
            'description' => 'required|string|min:5',
            'address'=> 'required|string',
            'price'=> 'numeric',
            'equipped'=>'required',
            'surfacearea'=> 'required',
            'housingtype_id'=> 'required',
            'citie_id'=>'required',
            'user_id'=>'required'
        ];
    }
}
