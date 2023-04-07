<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class BasicCard extends Component
{
    public function render(): View
    {
        return view(view: 'components.basic-card');
    }
}
