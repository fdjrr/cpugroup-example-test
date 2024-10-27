<?php

namespace App\Livewire\Dashboard\Product;

use App\Models\Product;
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
        $product = Product::find($this->id);
        if ($product) {
            $product->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Product deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Product not found.',
            ]);
        }
    }

    public function render()
    {
        $products = Product::query()->filter([
            'search' => $this->search,
        ])->orderBy('name')->paginate(10)->withQueryString();

        return view('livewire.dashboard.product.index', data: [
            'page_meta' => [
                'title' => 'List Product',
            ],
            'products'  => $products,
        ]);
    }
}
