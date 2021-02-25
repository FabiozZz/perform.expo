<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'title' => 'required|unique:projects|min:5|max:255',
            'except'=>'required|min:5|max:255',
            'content'=>'required|min:5|max:5000',
            'price'=>'required',
            'square'=>'required',
            'image' => 'required|max:2048'
        ];
    }
}
