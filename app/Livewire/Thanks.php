<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;


class Thanks extends Component
{

    public $orderId;
    public $DateTime;
    public $GrandTotal;

    public function mount(){

        $variables = Session::get('variables');

        if($variables){


            $this->orderId = $variables['orderid'];
            $this->DateTime = $variables['currentdate'];
            $this->GrandTotal = $variables['grandtotal'];
        }else{
            return redirect()->route('user.profile');
        }

    }

    public function render()
    {
        return view('livewire.thanks')->layout('front.layout.app-sim')->title('Thank You');
    }
}
