<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndpointStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'url' => 'required|url',
        ];
    }
}
