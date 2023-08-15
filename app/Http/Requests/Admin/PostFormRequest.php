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
                'category_id'=>[
                    'required',
                    'integer'

                ],
                'name'=>[
                    'string'

                ],
                'slug'=>[
                    'string'

                ],
                'image'=>[
                    'mimes:jpeg,jpg,png,webp'

                ],
                'caption'=>[
                    'string'

                ],
                'description'=>[
                    'string'

                ],
                'yt_iframe'=>[
                    'string'

                ],
                'meta_title'=>[
                    'string'

                ],
                'scheduled_at'=>[
                    'string', 

                ],
                'meta_description'=>[
                    'nullable'

                ],
                'meta_keyword.*'=>[
                    'string'

                ],
                'status'=>[
                    'nullable'

                ],

            ];
        
        return $rules;
    }
}
