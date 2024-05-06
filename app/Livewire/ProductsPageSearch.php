<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductsPageSearch extends Component
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
        return view('livewire.products-page-search');
    }
}
