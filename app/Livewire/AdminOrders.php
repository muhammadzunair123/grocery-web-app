<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class AdminOrders extends Component
{

    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        $orders = Order::latest('orders.created_at')->select('orders.*','users.name','users.email');
        $orders = $orders->leftJoin('users','users.id','orders.user_id');

            $orders = $orders->where('users.name','like',"%{$this->search}%");
            $orders = $orders->orWhere('users.email','like',"%{$this->search}%");
            $orders = $orders->orWhere('users.id','like',"%{$this->search}%");

        $orders = $orders->paginate(10);

        return view('livewire.admin-orders',compact('orders'))->layout('admin.layout.app')->title('Orders');
    }
}
