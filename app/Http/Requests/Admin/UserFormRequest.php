<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
                'first_name'=>[
                    'required',
                    'integer'

                ],
                'email'=>[
                    'required',
                    'string'

                ],
                'last_name'=>[
                    'required',
                    'integer'

                ],
                'location'=>[
                    'required',
                    'string'

                ],
                'dob'=>[
                    'required',
                    'integer'

                ],  
                'password'=>[
                    'required',
                    'string'

                ],
                'description'=>[
                    'nullable',
                    'string'

                ],
                'image'=>[
                    'required',
                    'mimes:jpeg,jpg,png,webp'

                ]
            ];
        
        return $rules;
    }
}
