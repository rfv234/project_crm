<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class NewsRequest extends FormRequest
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
            'news_name'=>'bail|required|max:128',
            'text'=>'required|max:1024',
            'id'=>'max:255'
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!empty($validator->errors()->all())) {
                $validator->errors()->add('field', 'В этом поле ошибка');
                return redirect('/your_error');
            }
        });
    }
}
