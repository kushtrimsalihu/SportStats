<?php

namespace App\Domains\Auth\Http\Requests\Backend\Livescore;

use App\Domains\Auth\Models\Livescore;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class LivescoreRequest.
 */
class LivescoreRequest extends FormRequest
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
            'league_name_sdn',
            'team1_name_nm',
            'team2_name_nm',
            'team1_goal_tr1',
            'team2_goal_tr2',
            'team1_t1_img',
            'team2_t2_img'
        ];
    }

    /** 
     * @return array
    */
}