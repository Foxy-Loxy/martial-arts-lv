<?php

namespace App\Http\Requests\ExamPass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamPassUpdateRequest extends FormRequest
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
            'commentary' => 'string|max:511',
            'result' => [
                'string',
                Rule::in([
                    'fail',
                    'miss',
                    'pass',
                    'upcoming',
                ])
            ],
        ];
    }
}
