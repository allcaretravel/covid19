<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class CreateBackendRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'area'     =>  'required',
            'province'  =>  'required',
            'case'  =>  'required',
            'date'  =>  'required',
            'amount'  =>  'required',
        ];
    }
}
