<?php

namespace App\Livewire;

use App\Livewire\Forms\GuestBook\StoreGuestBookForm;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Contact extends Component
{
    public StoreGuestBookForm $form;

    public function save()
    {
        $guest_book = $this->form->store();

        Session::flash('flash', [
            'type'    => 'success',
            'message' => 'Thank you for your message. We will get back to you as soon as possible.',
        ]);

        return $this->redirectRoute('contact');
    }

    public function render()
    {
        return view('livewire.contact', [
            'page_meta' => [
                'form' => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
