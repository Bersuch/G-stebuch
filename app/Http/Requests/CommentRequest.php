<?php

namespace App\http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    
    public function rules()
    {

        $id = $this->request->get('user_id');

        return [
            'subtitle' => 'required|max:255',
            'body' => 'required',
            'user_id'=> 'required'
        ];
    }
}