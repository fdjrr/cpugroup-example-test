<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
            Auth::login($user, $this->form->remember_me);

            return $this->redirectRoute('dashboard');
        } else {
            return Session::flash('flash', [
                'type'    => 'danger',
                'message' => 'Invalid credentials',
            ]);
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
