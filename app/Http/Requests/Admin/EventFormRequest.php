<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventFormRequest extends FormRequest
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
            $rules= [
                'external'=>[
                    'required'

                ],
                'host'=>[
                    'required'

                ],
                'start_time'=>[
                    'required'

                ],
                'end_time'=>[
                    'required'

                ],
                'main_artist'=>[
                    'required'

                ],
                'date'=>[
                    'required',

                ],
                'name'=>[
                    'string'

                ],
                'pre_reg'=>[
                    'string'

                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
                'group'=>[
                    'string'

                ],
                'description'=>[
                    'string'

                ],
                'sponsor'=>[
                    'string'

                ],
                'prize'=>[
                    'string'

                ],
                'created_by'=>[
                    'string',

                ],
                'location'=>[
                    'required'

                ],
                'artists.*'=>[
                    'string'

                ],
                'venue'=>[
                    'required'

                ],

            ];

        return $rules;
    }
}
