<?php

namespace App\Livewire\Dashboard\Branch;

use App\Livewire\Forms\Branch\UpdateBranchForm;
use App\Models\Branch;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.dashboard-layout')]
class Edit extends Component
{
    use WithFileUploads;

    public Branch $branch;
    public UpdateBranchForm $form;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $this->isUploaded = true;
    }

    public $isUploaded = false;

    public function mount(Branch $branch)
    {
        $this->branch = $branch;
        $this->form->fill($branch);
    }

    public function save()
    {
        $branch = $this->form->update($this->branch, $this->image);

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Branch updated',
        ]);

        return $this->redirectRoute('branches.edit', $branch->id);
    }

    public function render()
    {
        return view('livewire.dashboard.branch.form', [
            'page_meta' => [
                'title' => 'Edit Branch',
                'form'  => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
