<?php

namespace App\Http\Requests\ExamPass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExamPassStoreRequest extends FormRequest
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
            'trainee_id' => 'required|exists:trainees,id',
            'exam_id' => 'required|exists:exams,id',
        ];
    }
}
