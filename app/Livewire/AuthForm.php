<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AuthForm extends Component
{
    public $FinalAuthStep = 1;
    public $email ;
    public $user;
    public $name;
    public $first_name;
    public $last_name;
    public $password;

    public function checkEmail(){

        $this->validate([
            'email' => 'required|email',
        ]);

        $this->user = User::where('email',$this->email)->first();


        if($this->user){

            if($this->user->role === 2){
                $this->addError('email', 'You are not authorized to user panel.');
            }else{
                $this->FinalAuthStep = 2;
            }
        }
        else{
            $this->FinalAuthStep = 3;
            $this->first_name = '';
            $this->last_name = '';
            $this->password = '';
        }

    }


    public function register(){

        $this->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'password' => 'required|min:5',
        ]);

        $data = [
            'name' => $this->first_name.' '.$this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => 1,
        ];

        $insert = User::create($data);

        if(Auth::attempt(['email' => $insert->email, 'password' => $insert->password, 'role' => 1])){

            $this->FinalAuthStep = 2;

            // return redirect()->route('user.profile');

        }else{
           $this->addError('password', 'Please Enter Again.');
        }

    }


    public function login(){

        if(Auth::attempt(['email' => $this->user->email, 'password' => $this->password, 'role' => 1])){

            dd('Authenticated');

            // return redirect()->route('user.profile');

        }else{
           $this->addError('password', 'Invalid Password.');
        }



    }

    public function backArrow(){
        $this->FinalAuthStep = 1;
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function render()
    {

        $authStep = $this->FinalAuthStep;
        $userChecked = $this->user;

        return view('livewire.auth-form',compact('authStep','userChecked'))->layout('front.layout.app')->title('User');
    }
}
