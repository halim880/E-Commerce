<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AddCategoryComponent extends Component
{
    public $name;

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $this->name,
            'slug'=> Str::slug($this->name),
        ]);

        $this->reset('name');

        session()->flash('success', 'Category created successfully.');
    }

    public function render()
    {
        return view('livewire.admin.add-category-component');
    }
}
