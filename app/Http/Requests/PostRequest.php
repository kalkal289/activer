<?php

namespace App\Http\Requests;

// use Illuminate\Http\PostRequest;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'content' => 'string|max:300',
            'image.*' => 'image',
            'content' => 'exclude_unless:image,null|required', //imageがnullなら必須
            'image' => 'exclude_unless:content,null|required', //post.contentがnullなら必須
        ];
    }
}
