<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'main.title' => 'required|string|max:30',
            'main.content' => 'nullable|string|max:300',
            'image.*' => 'image',
            'main.content' => 'exclude_unless:image,null|required', //imageがnullなら必須
            'image' => 'exclude_unless:main.content,null|required', //main.contentがnullなら必須
        ];
    }
}
