<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'bio' => ['nullable'],
            'fb_url' => ['nullable'],
            'x_url' => ['nullable'],
            'website_url' => ['nullable'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
