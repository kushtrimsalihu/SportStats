<?php

namespace App\Domains\Auth\Http\Requests\Backend\Sports;

use Illuminate\Foundation\Http\FormRequest;

class CreateSportsRequest extends FormRequest
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
            'sport_name'=>'required',
            'type'=>'required',
        ];
    }
}