<?php

namespace App\http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestBookEntryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'subtitle' => 'required|max:255',
            'body' => 'required',
        ];
    }
}