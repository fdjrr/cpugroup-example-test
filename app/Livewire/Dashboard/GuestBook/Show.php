<?php

namespace App\Livewire\Dashboard\GuestBook;

use App\Livewire\Forms\GuestBook\StoreGuestBookForm;
use App\Models\GuestBook;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.dashboard-layout')]
class Show extends Component
{
    public GuestBook $guest_book;
    public StoreGuestBookForm $form;

    public function mount(GuestBook $guest_book)
    {
        $this->guest_book = $guest_book;
        $this->form->fill($guest_book);
    }

    public function render()
    {
        return view('livewire.dashboard.guest-book.form', [
            'page_meta'  => [
                'title' => 'Detail Guest Book',
            ],
            'guest_book' => $this->guest_book,
        ]);
    }
}
