<?php

namespace App\Domains\Auth\Http\Requests\Backend\League;

use Illuminate\Foundation\Http\FormRequest;

class LeagueRequest extends FormRequest
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
            'country'=>['required', 'max:255'],
            'name'=>['required', 'max:255'],
            'logo'=>'required',
            'type'=>['required', 'max:255']
        ];
    }
}
