<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Request;





class UserLogin extends Component
{

    public $email;

    public $redirectToCheckout = false;
    public $password;

    public $url;
    public $user;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'

    ];

    public function mount()
    {

        if (Request::has('authRedirect') && Request::get('authRedirect') === 'true') {
            $this->redirectToCheckout = true;
        }

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function login()
    {

        $this->validate();

        // $this->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        $this->user = User::where('email', $this->email)->first();

        if ($this->user) {
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password, 'role' => 1])) {

                if ($this->redirectToCheckout === true) {
                    return redirect()->route('checkout');
                } else {
                    return redirect()->route('user.profile');
                }


            } else {
                $this->addError('password', 'Invalid Email/Password.');
            }
        } else {
            $this->addError('email', 'User Doesn\'t Exist. Please Create An Account');
        }



    }
    public function render()
    {


        return view('livewire.user-login')->layout('front.layout.app-sim')->title('Login');
    }
}
