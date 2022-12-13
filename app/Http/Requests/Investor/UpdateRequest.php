<?php

namespace App\Http\Requests\Investor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
    public function rules(Request $r)
    {
        $id=$r->uptoken;
        return [
            'name'=>'required',
            'father_name'=>'required',
            'nominee_name'=>'required',
            'relationship'=>'required',
            'joining_date'=>'required',
            'email'=>'required|unique:investor_information,email,'.$id,
            'contact_no'=>'required|unique:investor_information,contact_no,'.$id,
            'national_id'=>'required|unique:investor_information,national_id,'.$id,
            'investor_id'=>'required|unique:investor_information,investor_id,'.$id,
        ];
    }

    public function messages(){
        return [
            'required' => "The :attribute filed is required",
            'unique' => "The :attribute already used. Please try another",
        ];
    }
}
