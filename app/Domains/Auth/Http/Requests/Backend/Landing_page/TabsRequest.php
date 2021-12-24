<?php

namespace App\Domains\Auth\Http\Requests\Backend\Landing_Page;

use App\Domains\Auth\Models\LandingPageModels\AboutUs;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


class TabsRequest extends FormRequest
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
        'tab1',
        'tab2',
        'tab3',
        'tab4',
        'tab1_description',
        'tab2_description',
        'tab3_description',
        'tab4_description'
        ];
    }

    /** 
     * @return array
    */
}