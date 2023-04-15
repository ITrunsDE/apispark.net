<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class SelectAuthenticationMethod extends Component
{
    public array $methods = [
        'none' => 'None',
        'api' => 'API Key',
        'bearer' => 'Bearer Token',
        'basic' => 'Basic Auth',
    ];

    public string|null $authentication;

    public array|null $authentication_parameters;

    public function render(): View
    {
        return view(
            view: 'livewire.select-authentication-method'
        );
    }
}
