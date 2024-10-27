<?php

namespace App\Livewire\Dashboard\Branch;

use App\Models\Branch;
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
        $branch = Branch::find($this->id);
        if ($branch) {
            $branch->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Branch deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Branch not found.',
            ]);
        }
    }

    public function render()
    {
        $branches = Branch::query()->filter([
            'search' => $this->search,
        ])->paginate(10)->withQueryString();

        return view('livewire.dashboard.branch.index', [
            'page_meta' => [
                'title' => 'List Branch',
            ],
            'branches'  => $branches,
        ]);
    }
}
