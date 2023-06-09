<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id){
        foreach (Cart::instance("wishlist")->content() as $item) {
            if($item->id==$product_id){
                Cart::instance("wishlist")->remove($item->rowId);
                $this->emitTo("wishlist-icon-component", 'refreshComponent');
            }
        }
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
