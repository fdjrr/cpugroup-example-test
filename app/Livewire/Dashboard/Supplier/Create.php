<?php

namespace App\Livewire\Dashboard\Supplier;

use App\Livewire\Forms\Supplier\StoreSupplierForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    public StoreSupplierForm $form;

    public function save()
    {
        $supplier = $this->form->store();

        return $this->redirectRoute('suppliers.edit', $supplier->id);
    }

    public function render()
    {
        return view('livewire.dashboard.supplier.form', [
            'page_meta' => [
                'title' => 'Create Supplier',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
