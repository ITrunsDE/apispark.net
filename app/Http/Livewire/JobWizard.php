<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class JobWizard extends Component
{
    public function render(): View
    {
        return view(view: 'livewire.job-wizard');
    }
}
