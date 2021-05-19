<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CovidCaseRequest extends FormRequest
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
            'province_id' => 'required',
            'total' => 'required',
            'recovered' => 'required',
            'deaths' => 'required',
            'community_case' => 'required',
            'foreigner_case' => 'required',
            'date' => 'required|date',
        ];
    }
}
