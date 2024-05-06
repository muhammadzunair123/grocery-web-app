<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserRegister extends Component
{

    public $redirectToCheckout = false;
    public $Email;
    public $First_name;
    public $Last_name;
    public $Password;

    protected $rules = [
        'First_name' => 'required|min:3',
        'Email' => 'required|email|unique:users',
        'Last_name' => 'required|min:3',
        'Password' => 'required|min:5',
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

    public function register()
    {

        $this->validate();

        // $this->validate([
        //     'First_name' => 'required|min:3',
        //     'Email' => 'required|email|unique:users',
        //     'Last_name' => 'required|min:3',
        //     'Password' => 'required|min:5',
        // ]);

        $data = [
            'name' => $this->First_name,
            'last_name' =>$this->Last_name,
            'email' => $this->Email,
            'password' => Hash::make($this->Password),
            'role' => 1,
        ];

        $insert = User::create($data);

        if ($insert) {

            if (Auth::attempt(['email' => $this->Email, 'password' => $this->Password])) {

                if ($this->redirectToCheckout === true) {
                    return redirect()->route('checkout');
                } else {
                    return redirect()->route('user.profile');
                }


            } else {
                $this->addError('Password', 'Authentication Failed.');
            }
        }

    }
    public function render()
    {
        return view('livewire.user-register')->layout('front.layout.app-sim')->title('Register');
    }
}
