<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttentionRequest extends FormRequest
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
            'attention_date' => 'required|date_format:d-m-Y',
            'attention_time' => 'required|regex:/(\d+:\d+)/',
            'comment_in' => 'required|min:4|max:500',
        ];
    }
}
