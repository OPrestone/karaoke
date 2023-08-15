<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VotingFormRequest extends FormRequest
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
        $rules = [
            'voter_id' => [
                'required',
                // Rule::unique('voters')->where(function ($query) {
                //     return $query->where('event_id', $this->event_id);
                // }),
            ],
            'event_id' => 'required', 
            'rating' => 'required',
            'comment' => 'required',
            'singer_id' => 'required',
        ];

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'voter_id.unique' => 'You have already voted for this.',
        ];
    }
}
