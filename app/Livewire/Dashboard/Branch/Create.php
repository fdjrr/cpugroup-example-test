<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\Branch\StoreBranchForm;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Create extends Component
{
    use WithFileUploads;

    public StoreBranchForm $form;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public $isUploaded = false;

    public function save()
    {
        $this->validate([
            'image' => 'required',
        ], attributes: [
            'image' => 'Gambar',
        ]);

        $branch = $this->form->store($this->image);

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Branch created',
        ]);

        return $this->redirectRoute('branches.edit', $branch->id);
    }

    public function render()
    {
        return view('livewire.dashboard.branch.form', [
            'page_meta' => [
                'title' => 'Create Branch',
                'form'  => [
                    'action' => 'save',
                ],
            ],
            'branch'    => new Branch(),
        ]);
    }
}
