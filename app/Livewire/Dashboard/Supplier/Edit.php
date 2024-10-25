<?php

namespace App\Livewire\Dashboard\Supplier;

use App\Livewire\Forms\Supplier\UpdateSupplierForm;
use App\Models\Supplier;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    public Supplier $supplier;
    public UpdateSupplierForm $form;

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->form->fill($supplier);
    }

    public function save()
    {
        $this->form->update($this->supplier);

        return $this->redirectRoute('suppliers.edit', $this->supplier->id);
    }

    public function render()
    {
        return view('livewire.dashboard.supplier.form', [
            'page_meta' => [
                'title' => 'Edit Supplier',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
