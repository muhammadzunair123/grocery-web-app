<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class Profile extends Component
{
    public function render()
    {

        $user = Auth::user();

        $orders = Order::where('user_id',$user->id)->orderBy('created_at','DESC')->get();

        return view('livewire.profile',compact('orders'))->layout('front.layout.app-sim')->title('Profile');
    }
}
