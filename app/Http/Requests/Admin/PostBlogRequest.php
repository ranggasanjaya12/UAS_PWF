<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':
            {    
                return [
                    'thumbnail'     => ['required', 'image'],
                    'title'         => ['required'],
                    'catblog_id'    => ['required'],
                    'exceprt'       => ['required'],
                    'description'   => ['required'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'thumbnail'     => ['image'],
                    'title'         => ['required'],
                    'catblog_id'    => ['required'],
                    'exceprt'       => ['required'],
                    'description'   => ['required'],
                ];                
            }
            default: break;
        };
    }
}
