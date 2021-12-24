<?php

namespace App\Domains\Auth\Http\Requests\Backend\Landing_Page;

use App\Domains\Auth\Models\LandingPageModels\LandingPage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


class LandingPageRequest extends FormRequest
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
            'title',
            'description',
            'image',
            
        ];
    }

    /** 
     * @return array
    */
}