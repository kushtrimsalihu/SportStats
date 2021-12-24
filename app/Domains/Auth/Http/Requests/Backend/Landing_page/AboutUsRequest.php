<?php

namespace App\Domains\Auth\Http\Requests\Backend\Landing_Page;

use App\Domains\Auth\Models\LandingPageModels\AboutUs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


class AboutUsRequest extends FormRequest
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
        ];
    }

    /** 
     * @return array
    */
}