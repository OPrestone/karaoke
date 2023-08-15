<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlbumFormRequest extends FormRequest
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
                'date'=>[
                    'string' 

                ],
                'name'=>[
                    'string'

                ],
                'venue'=>[
                    'string'

                ],
                'image'=>[
                    'mimes:jpeg,jpg,png,webp'

                ], 
                'description'=>[
                    'string'

                ], 
                'meta_description'=>[
                    'nullable'

                ], 

            ];
        
        return $rules;
    }
}
