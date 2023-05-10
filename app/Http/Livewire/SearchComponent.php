<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchComponent extends Component
{
    public $q;
    public function mount(){
        $this->fill(request()->only('q'));
    }
    public function render()
    {
        return view('livewire.search-component');
    }
}
