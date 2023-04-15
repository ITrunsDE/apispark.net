<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndpointUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'url' => ['required', 'url'],
            'authentication' => ['required', 'string'],
            'authentication_parameters' => ['nullable', 'array'],
            'authentication_parameters.bearer' => ['required_if:authentication,bearer', 'string'],
            'authentication_parameters.api_add_to' => ['required_if:authentication,api', 'string'],
            'authentication_parameters.api_key' => ['required_if:authentication,api', 'string'],
            'authentication_parameters.api_value' => ['required_if:authentication,api', 'string'],
            'authentication_parameters.basic_username' => ['required_if:authentication,basic', 'string'],
            'authentication_parameters.basic_password' => ['required_if:authentication,basic', 'string'],
        ];
    }
}
