<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest-layout')]
class Login extends Component
{
    public LoginForm $form;

    public function save()
    {
        $user = $this->form->verify();

        if ($user) {
            Auth::login($user);

            return $this->redirectRoute('dashboard');
        } else {
            dd("failed");
        }
    }

    public function render()
    {
        return view('livewire.auth.login', [
            'page_meta' => [
                'form' => [
                    'action' => 'save',
                ],
            ],
        ]);
    }
}
