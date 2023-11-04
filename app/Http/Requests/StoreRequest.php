<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'store.title' => 'required|string|max:30',
            'store.content' => 'string|max:300|nullable',
            'image.*' => 'image',
            'store.content' => 'exclude_unless:image,null|required', //imageがnullなら必須
            'image' => 'exclude_unless:store.content,null|required', //store.contentがnullなら必須
        ];
    }
}
