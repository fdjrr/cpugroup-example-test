<?php

namespace App\Livewire\Forms\Branch;

use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreBranchForm extends Form
{
    public $image;

    #[Validate('required|unique:branches,name', as: 'Nama Cabang / Depo')]
    public $name;

    #[Validate('required', as: 'Wilayah')]
    public $region;

    #[Validate('required', as: 'Telepon')]
    public $phone;

    #[Validate('required', as: 'Fax')]
    public $fax;

    #[Validate('required', as: 'Email')]
    public $email;

    #[Validate('required', as: 'Alamat')]
    public $address;

    #[Validate('required', as: 'Google Maps')]
    public $gmaps_link;

    public function store($image)
    {
        $this->validate();

        $branch = Branch::create([
            'image'      => $image->store('branchs', 'public'),
            'name'       => $this->name,
            'region'     => $this->region,
            'phone'      => $this->phone,
            'fax'        => $this->fax,
            'email'      => $this->email,
            'address'    => $this->address,
            'gmaps_link' => $this->gmaps_link,
        ]);

        return $branch;
    }
}
