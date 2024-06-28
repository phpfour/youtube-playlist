<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['nullable'],
            'event_id' => ['required', 'exists:events'],
            'speaker_id' => ['required', 'exists:speakers'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
