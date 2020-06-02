<?php

namespace App\Http\Requests\Trainee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TraineeStoreRequest extends FormRequest
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
            'phone' => 'required|max:255|string',
            'bday' => 'required|date',
            'trainer_id' => 'required|exists:trainers,id',
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
