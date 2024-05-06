<?php

namespace App\Livewire;

use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class ForgotPassword extends Component
{

    public $email;
    public $formSubmitted;

    public function mount(){
        $this->formSubmitted = false;
    }

    public function forgot(){
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $token = Str::random(60);

        \DB::table('password_reset_tokens')->where('email',$this->email)->delete();


        \DB::table('password_reset_tokens')->insert([

            'email' => $this->email,
            'token' => $token,
            'created_at' => now(),

        ]);

        // Send Email Here

        $user = User::where('email',$this->email)->first();

        $formData = [
            'token' => $token,
            'user' => $user,
            'mailSubject' => 'You Bahtareen Reset Password Link'
        ];

        Mail::to($this->email)->send(new ResetPasswordEmail($formData));

        $this->formSubmitted = true;

        // return redirect()->route('home');

    }

    public function redirectToHome(){

        $redirection = 'authRedirect=true';
        return redirect()->route('home',$redirection);

    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
