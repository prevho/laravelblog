<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            //
            'title' => ['required', 'max:300', 'min:5'],
            // 'slug' => ['required'],
            'body' => ['required', 'min:5'],
            'image' => ['sometimes', 'mimes:jpg,png,jpeg,svg.gif', 'max:2048'],
            'description' => ['required', 'min:5', 'max:250'],
            'category_id' => ['required', 'numeric'],
            'tags' => ['required'],
            'published_at' => ['required'],
            
        ];
    }
}
