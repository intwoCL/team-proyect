<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
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
            'name'=>'required|min:4|max:100',
            'objective'=>'required|min:4|max:300',
            'scale_id'=>'required|exists:scales,id',
            'total_time'=>'required|min:1|max:1000',
            'categories'=>'required|array|min:1'
        ];
    }
}
