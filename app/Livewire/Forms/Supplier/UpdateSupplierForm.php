<?php

namespace App\Livewire\Forms\Supplier;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateSupplierForm extends Form
{
    public $name;

    public $contact_info;

    public $address;

    public function update(Supplier $supplier)
    {
        $this->validate([
            'name'         => "required|unique:suppliers,name,{$supplier->id}",
            'contact_info' => 'required',
            'address'      => 'required',
        ], attributes: [
            'name'         => 'Nama Supplier',
            'contact_info' => 'Kontak Info',
            'address'      => 'Alamat',
        ]);

        $supplier->update([
            'name'         => $this->name,
            'contact_info' => $this->contact_info,
            'address'      => $this->address,
        ]);

        return $supplier;
    }
}
