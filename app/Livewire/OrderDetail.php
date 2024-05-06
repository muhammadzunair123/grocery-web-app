<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductImage;
use Livewire\Component;

class OrderDetail extends Component
{

    public $orderId;

    public function mount($orderId){
        $this->orderId = $orderId;
    }

    public function render()
    {

        $order = Order::where('id',$this->orderId)->first();
        $orderItems = OrderItem::where('order_id',$this->orderId)->get();

        return view('livewire.order-detail',compact('order','orderItems'))->layout('front.layout.app-sim')->title('Order Detail');
    }
}
