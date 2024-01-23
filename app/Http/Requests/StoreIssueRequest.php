<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class StoreIssueRequest extends FormRequest
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
            'status' => 'required', // Add any other rules for 'status' field
            'project_id' => 'required|exists:projects,id', // Add this rule for 'project_id'
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'The Status field is required.',
            'status.in' => 'Please select a valid Status option.',
            'developer.exists' => 'The selected Developer is not valid.',
        ];
    }

}
