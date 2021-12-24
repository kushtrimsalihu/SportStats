<?php

namespace App\Domains\Auth\Http\Requests\Backend\Landing_Page;

use App\Domains\Auth\Models\LandingPageModels\DashboardView;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;


class DashboardViewRequest extends FormRequest
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
            'image_admin',
            'title_admin',
            'descripiton_admin',
            'descripiton_cards',
            'image_user',
            'title_user',
            'descripiton_user'
        ];
    }

    /** 
     * @return array
    */
}