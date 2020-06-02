<?php

namespace App\Http\Requests\Trainer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TrainerInfoUpdateRequest extends FormRequest
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
            'name' => 'required|max:255|string',
            'email' => 'required|max:255|string',
            'address' => 'required|max:255|string',
            'title' => 'required|max:255|string',
            'about' => 'required|max:1023|string',
            'phone' => 'required|max:255|string',
            'bday' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
            'level' => 'required|integer|max:10|min:1',
            'level_type' => [
              'required',
              'string',
              Rule::in([
                  'que',
                  'dan',
              ]),
            ],
        ];
    }
}
