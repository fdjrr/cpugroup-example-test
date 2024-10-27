<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url]
    public $region;

    #[Computed]
    public function branches()
    {
        $branches = $this->region ? Branch::query()->filter([
            'region' => $this->region,
        ])->get() : [];

        return $branches;
    }

    public function render()
    {
        $regions = Branch::query()->select('region as name')->groupBy('region')->get();

        return view('livewire.branch.index', [
            'regions' => $regions,
        ]);
    }
}
