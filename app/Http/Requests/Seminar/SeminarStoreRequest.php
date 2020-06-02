<?php

namespace App\Http\Requests\Seminar;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeminarStoreRequest extends FormRequest
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
            'when' => 'required|date',
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|max:255|string',
            'description' => 'required|max:1023|string',
        ];
    }
}
