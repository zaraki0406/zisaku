<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
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
        'name' => 'required|max:10',
        'image' => 'required',
        'height' => 'integer|max:10|nullable' ,
        'profile' => 'max:500|nullable'
        ];
    }
}