<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{

    public $email = '';

    public $password = '';

    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required',
    ];

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function login()
    {
        $credentials = $this->validate();

        if ( ! auth()->attempt($credentials)) {
            $this->addError('email', trans('auth.failed'));
            return;
        }

        $user = User::where('email', $this->email)->first();
        if ($user && $user->roles !== 'admin') {
            auth()->logout();
            abort(403, 'Sorry buddy, you are not admin user');
        }

        return redirect()->intended(route('admin.dashboard'));
    }

    public function render()
    {
        return view('livewire.admin.login')
            ->layout('layouts.auth');
    }
}
