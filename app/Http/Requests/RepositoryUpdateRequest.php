<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepositoryUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'ingest_token' => 'required|uuid',
            'base_url' => 'required|url',
        ];
    }
}
