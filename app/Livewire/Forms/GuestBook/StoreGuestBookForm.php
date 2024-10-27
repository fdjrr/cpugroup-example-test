<?php

namespace App\Livewire\Forms\GuestBook;

use App\Models\GuestBook;
use Livewire\Attributes\Validate;
use Livewire\Form;

class StoreGuestBookForm extends Form
{
    #[Validate('required', as: 'Nama')]
    public $name;

    #[Validate('required|email', as: 'Email')]
    public $email;

    #[Validate('required|numeric', as: 'HP / Telp')]
    public $phone;

    #[Validate('required|min:10', as: 'Subject')]
    public $subject;

    #[Validate('required|min:10', as: 'Pesan')]
    public $message;

    public function store()
    {
        $this->validate();

        $guest_book = GuestBook::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        return $guest_book;
    }
}
