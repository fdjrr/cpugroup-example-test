<?php

use function Livewire\Volt\{state};
use Illuminate\Support\Facades\Auth;

$logout = function () {
    Auth::logout();

    return redirect()->route('auth.login');
};

?>

<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" href="javascript:void(0)" role="menuitem" wire:click="logout">Sign out</a>
