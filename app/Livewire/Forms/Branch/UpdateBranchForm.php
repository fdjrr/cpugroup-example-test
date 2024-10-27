<?php

namespace App\Livewire\Forms\Branch;

use App\Models\Branch;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateBranchForm extends Form
{
    public $id;

    public $image;

    public $name;

    public $region;

    public $phone;

    public $fax;

    public $email;

    public $address;

    public $gmaps_link;

    public function update(Branch $branch, $image)
    {
        $this->validate([
            'name'       => "required|unique:branches,name,{$branch->id}",
            'region'     => 'required',
            'phone'      => 'required',
            'fax'        => 'required',
            'email'      => 'required',
            'address'    => 'required',
            'gmaps_link' => 'required',
        ], attributes: [
            'name'       => 'Nama Cabang / Depo',
            'region'     => 'Wilayah',
            'phone'      => 'Telepon',
            'fax'        => 'Fax',
            'email'      => 'Email',
            'address'    => 'Alamat',
            'gmaps_link' => 'Google Maps',
        ]);

        $branch->update([
            'image'      => $image ? $image->store('branchs', 'public') : $branch->image,
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
