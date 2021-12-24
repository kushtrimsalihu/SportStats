<?php

namespace App\Domains\Auth\Http\Requests\Backend\Faq;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            // 'faq_id'=>['required', 'max:255'],
            'questions'=>['required', 'max:1000'],
            'answers'=>['required', 'max:1000']
        ];
    }
}
