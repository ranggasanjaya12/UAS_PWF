<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
                    'banner'        => ['required', 'image'],
                    'title'         => ['required'],
                    'category_id'   => ['required'],
                    'location'      => ['required'],
                    'shortdesc'     => ['required'],
                    'description'   => ['required'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'banner'        => ['image'],
                    'title'         => ['required'],
                    'category_id'   => ['required'],
                    'location'      => ['required'],
                    'shortdesc'     => ['required'],
                    'description'   => ['required'],
                ];                
            }
            default: break;
        };
    }
}
