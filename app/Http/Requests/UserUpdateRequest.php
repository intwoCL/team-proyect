<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
          'email' => 'required|email|min:4|max:100|',
          'lang' => 'required',
          'first_name' => 'required|min:4|max:100',
          'last_name' => 'required|min:4|max:100',
          // 'run' => 'regex:/^\d{7,8}[0-9K]{1}$/',
        ];
    }
}
