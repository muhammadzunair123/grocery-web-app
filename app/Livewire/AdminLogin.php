<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class AdminLogin extends Component
{
    public $email;

    public $password;

    public function login(){

        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if(Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password ])){

            $admin = Auth::guard('admin')->user();

            if($admin->role == 2){
                return $this->redirect( route('admin.dashboard') , navigate:true );
            }else{
                Auth::guard('admin')->logout();
                $this->reset(['email','password']);
                request()->session()->flash('error','You Are not Authorized To Admin Panel');
            }

        }else{
            $this->reset(['password']);
            request()->session()->flash('error','Invalid Email/Password');
        }

    }

    public function render()
    {
        return view('livewire.admin-login');
    }
}
