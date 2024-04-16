<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoommateOfferRequest extends FormRequest
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
                'citie_id' => 'required',
                'address' => 'required|string',
                'housingtype_id' => 'required',
                'roomtype' => 'required',
                'budget' => 'required',
                'numberofroommates' => 'required',
                'petperson' => 'required',
                'smoker' => 'required',
                'gender'=> 'required'
        ];
    }
}
