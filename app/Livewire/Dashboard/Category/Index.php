<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
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
        $categories = Category::query()->filter([
            'search' => $this->search,
        ])->orderBy('name')->paginate(10)->withQueryString();

        return view('livewire.dashboard.category.index', [
            'page_meta'  => [
                'title' => 'List Category',
            ],
            'categories' => $categories,
        ]);
    }
}
