<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDetailSearch extends Component
{
    public $query;
    public $results;

    public function mount()
    {
        $this->resetAll();
    }

    public function resetAll()
    {
        $this->query = '';
        $this->results = [];
    }
    public function updatedQuery()
    {

        if (empty($this->query)) {
            $this->results = [];
        } else {
            $this->results = Product::where('title', 'like', '%' . $this->query . '%')->get();
        }
    }
    public function render()
    {
        return view('livewire.product-detail-search');
    }
}
