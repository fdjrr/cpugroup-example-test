<?php

namespace App\Livewire\Dashboard\ProductDiscount;

use App\Models\ProductDiscount;
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

    public function updatingSearch() {
        return $this->resetPage();
    }

    public $id;

    public function delete($id)
    {
        $this->id = $id;

        return $this->dispatch('openDeleteModal');
    }

    public function confirmDelete()
    {
        $product_discount = ProductDiscount::find($this->id);
        if ($product_discount) {
            $product_discount->delete();

            Session::flash('flash', [
                'type'    => 'success',
                'message' => 'Product Discount deleted',
            ]);

            return $this->dispatch('closeDeleteModal');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Product Discount not found.',
            ]);
        }
    }

    public function render()
    {
        $product_discounts = ProductDiscount::query()->with(['product'])->filter([
            'search' => $this->search
        ])->orderByDesc('expired_at')->paginate(10)->withQueryString();

        return view('livewire.dashboard.product-discount.index', [
            'page_meta' => [
                'title' => 'List Product Discount'
            ],
            'product_discounts' => $product_discounts
        ]);
    }
}
