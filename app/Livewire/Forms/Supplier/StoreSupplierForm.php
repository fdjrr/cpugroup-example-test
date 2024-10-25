<?php

namespace App\Livewire\Forms\Supplier;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreSupplierForm extends Form
{
    #[Validate('required|unique:suppliers,name', as: 'Nama Supplier')]
    public $name;

    #[Validate('required', as: 'Kontak Info')]
    public $contact_info;

    #[Validate('required', as: 'Alamat')]
    public $address;

    public function store()
    {
        $this->validate();

        $supplier = Supplier::create([
            'name'         => $this->name,
            'contact_info' => $this->contact_info,
            'address'      => $this->address,
        ]);

        return $supplier;
    }
}
