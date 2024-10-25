<?php

namespace App\Livewire\Dashboard\Supplier;

use App\Models\Supplier;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.dashboard-layout')]
class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $suppliers = Supplier::query()->filter([
            'search' => $this->search,
        ])->orderBy('name')->paginate(10)->withQueryString();

        return view('livewire.dashboard.supplier.index', [
            'page_meta' => [
                'title' => 'List Supplier',
            ],
            'suppliers' => $suppliers,
        ]);
    }
}
