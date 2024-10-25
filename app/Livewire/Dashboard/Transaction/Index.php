<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Models\Transaction;
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
        $transactions = Transaction::query()->filter([
            'search' => $this->search,
        ])->orderByDesc('transaction_date')->orderByDesc('id')->paginate(10)->withQueryString();

        return view('livewire.dashboard.transaction.index', [
            'page_meta'    => [
                'title' => 'List Transaction',
            ],
            'transactions' => $transactions,
        ]);
    }
}
