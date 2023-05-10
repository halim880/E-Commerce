<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
class CartComponent extends Component
{
    public function increaseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
        $this->emitTo("cart-icon-component", 'refreshComponent');
    }

    public function decreaseQty($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
        $this->emitTo("cart-icon-component", 'refreshComponent');
    }

    public function remove($rowId){
        Cart::remove($rowId);
        session()->flash("success_message", "Cart Item Removed");
        $this->emitTo("cart-icon-component", 'refreshComponent');
    }

    public function clearAll(){
        Cart::destroy();
        $this->emitTo("cart-icon-component", 'refreshComponent');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
