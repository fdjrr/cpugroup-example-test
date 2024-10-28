<?php

namespace App\Livewire\Dashboard\ProductDiscount;

use App\Models\ProductDiscount;
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
