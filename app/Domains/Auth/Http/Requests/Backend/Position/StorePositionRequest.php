<?php

namespace App\Domains\Auth\Http\Requests\Backend\Position;

use App\Domains\Auth\Models\Position;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class StorePositionRequest.
 */
class StorePositionRequest extends FormRequest
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
            'position_type' => ['required', 'max:100'],
            'sport' => ['required']
        ];
    }

    /** 
     * @return array
    */
}