<?php

namespace App\Livewire\Forms\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|email', as: 'Email')]
    public $email;

    #[Validate('required', as: 'Password')]
    public $password;

    public $remember_me = false;

    public function verify()
    {
        $this->validate();

        $user = User::query()->where('email', $this->email)->first();
        if (!$user || !Hash::check($this->password, $user->password)) {
            return null;
        }

        return $user;
    }
}
