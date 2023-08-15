<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SongFormRequest extends FormRequest
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
                'artist'=>[
                    'required',
                    'string'

                ],
                'track_name'=>[
                    'string'

                ],
                'karaokevid'=>[
                    'string'

                ],
                'preview_url'=>[
                    'string'

                ],
                'youtube_id'=>[
                    'string'

                ],
                'image_url'=>[
                    'mimes:jpeg,jpg,png,webp'

                ],
                'album'=>[
                    'string'

                ],
                'lyrics'=>[
                    'string'

                ], 

            ];
        
        return $rules;
    }
}
