<?php

namespace App\Livewire\Dashboard\Branch;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    public function render()
    {
        return view('livewire.branch.form');
    }
}
