<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
        // return auth()->check();
    }

    public function rules()
    {
        return [
            'img' => 'required',
            'book_name' => 'required|max:255',
            'author_id' => 'required|max:255',
            'description' => 'required|max:1000',
        ];
    }
}
