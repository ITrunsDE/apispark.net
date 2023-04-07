<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndpointJobUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'endpoint_id' => 'required|exists:endpoints,id',
            'interval_id' => 'required|exists:intervals,id',
            'repository_id' => 'required|exists:repositories,id',
            'active' => 'nullable|string'
        ];
    }
}
