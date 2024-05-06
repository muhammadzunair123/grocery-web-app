<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User as UserTable;
use Livewire\WithPagination;

class Users extends Component
{

    use WithPagination;

    public $search;

    public function render()
    {

        $users = UserTable::latest('id')->where('name','like',"%{$this->search}%")->orWhere('last_name','like',"%{$this->search}%")->paginate(8);

        return view('livewire.users',compact('users'))->layout('admin.layout.app')->title('Users');
    }
}
