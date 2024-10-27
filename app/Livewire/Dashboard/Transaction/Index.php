<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Models\Transaction;
use Illuminate\Support\Facades\Session;
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

    public $id;

    public function delete($id)
    {
        $this->id = $id;

        return $this->dispatch('openDeleteModal');
    }

    public function confirmDelete()
    {
        $transaction = Transaction::find($this->id);
        if ($transaction) {
            $transaction->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Transaction deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Transaction not found.',
            ]);
        }
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
