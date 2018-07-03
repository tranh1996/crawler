<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Requests;

class ItemRequest extends FormRequest
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
            'title' => 'required',
            'descriptionContent' => 'required',
            'pubDate' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You must enter title',
            'title.descriptionContent' => 'You must enter descriptionContent',
            'title.pubDate' => 'You must enter pubDate'
        ];
    }
}
