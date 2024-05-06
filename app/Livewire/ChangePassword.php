<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Http\Request;


class ChangePassword extends Component
{

    public $token;
    public $tokenExist;
    public $password;
    public $confirm_password;
    public $formSubmitted;



    public function mount(Request $request)
    {
        $this->formSubmitted = false;

        $this->token = $request->input('token');

        $this->tokenExist = \DB::table('password_reset_tokens')->where('token', $this->token)->first();

        // dd($tokenExist);

        if ($request->input('token') != null) {
            if ($this->tokenExist === null) {
                return redirect()->route('home')->with('ForgotError', 'Your Token Has Been Expired. Please Try Again');
            }
        }
    }

    public function resetPassword()
    {



            $user = User::where('email',$this->tokenExist->email)->first();

            $this->validate([
                'password' => 'required|min:5',
                'confirm_password' => 'required|same:password',
            ]);

            User::where('id',$user->id)->update([
                'password' => Hash::make($this->password)
            ]);

            \DB::table('password_reset_tokens')->where('email', $user->email)->delete();

            $this->formSubmitted = true;

    }


    public function render()
    {
        return view('livewire.change-password');
    }
}
