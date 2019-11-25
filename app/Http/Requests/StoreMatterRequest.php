<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'case_number' => 'required|integer',
            'year' => 'required|integer',
            'bench_id' => 'required|integer',
            'case_side_id' => 'required|integer',
            'case_type_id' => 'required|integer',
            'stamp_register_id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'case_number.required' => 'case number is required',
            'case_number.integer' => 'case number should be number',
            'year.required' => 'year is required',
            // 'year.integer' => 'year should be number',
            'bench_id.required' => 'bench is required',
            'bench_id.integer' => 'invalid bench',
            'case_side_id.required' => 'case side is required',
            'case_side_id.integer' => 'invalid side',
            'case_type_id.required' => 'case type is required',
            'case_type_id.integer' => 'invalid case type',
            'stamp_register_id.required' => 'stamp or register is required',
            'stamp_register_id.integer' => 'invalid stamp or register'
        ];
    }
}
