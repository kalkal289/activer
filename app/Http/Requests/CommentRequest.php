<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'comment.content' => 'string|max:150',
            'image.*' => 'image',
            'comment.content' => 'exclude_unless:image,null|required', //imageがnullなら必須
            'image' => 'exclude_unless:comment.content,null|required', //comment.contentがnullなら必須
        ];
    }
}
