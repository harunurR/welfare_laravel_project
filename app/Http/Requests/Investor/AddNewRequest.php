<?php

namespace App\Http\Requests\Investor;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'name'=>'required',
            'father_name'=>'required',
            'nominee_name'=>'required',
            'relationship'=>'required',
            'joining_date'=>'required',
            'email'=>'required|unique:investor_information,email',
            'contact_no'=>'required|unique:investor_information,contact_no',
            'national_id'=>'required|unique:investor_information,national_id',
            'investor_id'=>'required|unique:investor_information,investor_id'
        ];
    }

    public function messages(){
        return [
            'required' => "The :attribute filed is required",
            'unique' => "The :attribute already used. Please try another",
        ];
    }
}
