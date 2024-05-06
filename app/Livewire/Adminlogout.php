<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Adminlogout extends Component
{

    public function logout(){

        Auth::guard('admin')->logout();

        return redirect(route('admin.login'));

    }

    public function render()
    {
        return view('livewire.adminlogout');
    }
}
