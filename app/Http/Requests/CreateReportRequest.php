<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReportRequest extends FormRequest
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
            'candidate_id' => 'required|int',
            'status_id' => 'required|int',
            'position_id' => 'required|int',
            'candidate_email' => 'required|email',
            'company_email' => 'required|email',
            'observations' => 'required'
        ];
    }
}
