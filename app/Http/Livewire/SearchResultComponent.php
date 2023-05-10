<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchResultComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = "Default sorting";

    public $query;
    public $search_term;

    public function mount(){

        $this->fill(request()->only('query'));
        $this->search_term = "%".$this->query."%";
    }

    public function store($product_id, $product_name, $price){
        Cart::add($product_id, $product_name,1,$price)->associate("\App\Models\Product");
        session()->flash("success_message", "Item added in Cart");
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size){
        $this->pageSize = $size;
    }

    public function changeOrder($orderBy){
        $this->orderBy = $orderBy;
    }




    public function render()
    {
        $categories = Category::all();
        $products = Product::Where("name", "like", $this->search_term)->Paginate($this->pageSize);
        return view('livewire.search-result-component', [
            'products'=> $products,
            'categories' => $categories
        ]);
    }
}
