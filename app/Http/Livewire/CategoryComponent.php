<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Component;

class CategoryComponent extends Component
{
    use WithPagination;
    public $slug;
    public $pageSize = 12;
    public $orderBy = "Default sorting";
    public $min_value = 0;
    public $max_value = 10000;

    public function mount($slug){
        $this->slug = $slug;
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
        
        $category = Category::Where("slug", $this->slug)->first();
        $category_id = $category->id;
        if($this->orderBy== "Price: Low to High"){
            $products = Product::where('category_id', $category_id)->whereBetween("regular_price", [$this->min_value, $this->max_value])->orderBy('regular_price', 'ASC')->Paginate($this->pageSize);
        }
        else if($this->orderBy== "Price: High to Low"){
            $products = Product::where('category_id', $category_id)->whereBetween("regular_price", [$this->min_value, $this->max_value])->orderBy('regular_price', 'DESC')->Paginate($this->pageSize);
        }
        else if($this->orderBy== "New Products"){
            $products = Product::where('category_id', $category_id)->whereBetween("regular_price", [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->Paginate($this->pageSize);
        }
        else {
            $products = Product::where('category_id', $category_id)->whereBetween("regular_price", [$this->min_value, $this->max_value])->Paginate($this->pageSize);
        }
        $categories = Category::all();

        return view('livewire.category-component', [
            'products'=> $products,
            'categories' => $categories,
            'category'=> $category,
            'category_name'=> $category->name,
        ]);
    }
}
