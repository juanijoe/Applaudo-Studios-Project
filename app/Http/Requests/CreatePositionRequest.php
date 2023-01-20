<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePositionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'company_id' => 'required|int',
            'recruiter_id' => 'required|int',
            'salary' => 'required|int',
            'description' => 'required|regex:/^[a-zA-Z\s-]+$/|max:255',
            'position_status' => 'required|bool',
        ];
    }
}
