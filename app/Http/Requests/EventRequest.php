<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['required'],
            'details' => ['nullable'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'venue' => ['required'],
            'user_id' => ['required', 'exists:users'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
