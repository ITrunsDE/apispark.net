<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepositoryStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'ingest_token' => 'required|uuid|unique:repositories,ingest_token',
            'base_url' => 'required|url',
        ];
    }
}
