<?php

namespace App\Domains\Auth\Http\Requests\Backend\About;

use App\Domains\Auth\Models\LandingPageModels\AboutUs;
use App\Domains\Auth\Models\LandingPageModels\About;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


class AboutRequest extends FormRequest
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
            'title_aboutus',
            'description_aboutus',
            'title_cards',
            'description_cards',
            'title2_cards',
            'description2_cards',
            'title3_cards',
            'description3_cards',
            'tab1',
            'tab2',
            'tab3',
            'tab4',
            'tab1_description',
            'tab2_description',
            'tab3_description',
            'tab4_description',
            'confused_features',
            'trial_days',
            'offer',
            'offer_description'
        ];
    }

    /** 
     * @return array
    */
}