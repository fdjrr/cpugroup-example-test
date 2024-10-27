<?php

namespace App\Livewire\Dashboard\GuestBook;

use App\Models\GuestBook;
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
        $guest_books = GuestBook::query()->filter([
            'search' => $this->search,
        ])->paginate(10)->withQueryString();

        return view('livewire.dashboard.guest-book.index', [
            'page_meta'   => [
                'title' => 'List Guest Book',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'guest_books' => $guest_books,
        ]);
    }
}
