<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;
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

    public $id;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $this->id = $id;

        return $this->dispatch('openDeleteModal');
    }

    public function confirmDelete()
    {
        $category = Category::find($this->id);
        if ($category) {
            $category->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Category deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Category not found.',
            ]);
        }
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
