<?php

namespace App\Livewire\Dashboard\Supplier;

use App\Models\Supplier;
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
        $supplier = Supplier::find($this->id);
        if ($supplier) {
            $supplier->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Supplier deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Supplier not found.',
            ]);
        }
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
