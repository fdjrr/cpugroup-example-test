<?php

namespace App\Livewire\Product;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[Url]
    public $category_id;

    public function updatingCategoryId()
    {
        $this->resetPage();
    }

    public function selectProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product = new ProductResource($product);

            $this->dispatch('openProductModal', product: $product);
        }
    }

    public function render()
    {
        $products = $this->category_id ? Product::query()->filter([
            'search'      => $this->search,
            'category_id' => $this->category_id,
        ])->orderBy('name')->paginate(4)->withQueryString() : [];

        return view('livewire.product.index', [
            'products'   => $products,
            'categories' => Category::query()->orderBy('name')->get(),
        ]);
    }
}
