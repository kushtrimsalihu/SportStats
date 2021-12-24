<?php

namespace App\Domains\Auth\Http\Requests\Backend\Statistics;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
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
            'matches_played'=>'required|numeric|min:0',
            'goals'=>'required|numeric|min:0',
            'assists'=>'required|numeric|min:0',
            'yellow_cards'=>'required|numeric|min:0',
            'red_cards'=>'required|numeric|min:0',
            'player'=>'required|numeric|min:0',
            'from_date'=>'required',
            'to_date'=>'required'
        ];
    }
}
