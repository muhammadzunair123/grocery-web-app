<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChangeAdminPassword extends Component
{

    public $old_password;
    public $new_password;
    public $confirm_password;

    public function ChangePassword () {

        $this->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:3',
            'confirm_password' => 'required|same:new_password',
        ]);

        $id = Auth::guard('admin')->user()->id;

        $admin = User::where('id',$id)->first();

        if(!Hash::check($this->old_password, $admin->password)){
            session()->flash('error','Your Old Password Is Incorrect, Please Try Again');
        }else{

            User::where('id',$id)->update([
                'password' => Hash::make($this->new_password),
            ]);

            session()->flash('success', 'Your Password Changed Successfully');

            $this->reset(['old_password','new_password','confirm_password']);
        }



    }

    public function render()
    {
        return view('livewire.change-admin-password')->layout('admin.layout.app')->title('Change Password');
    }
}
