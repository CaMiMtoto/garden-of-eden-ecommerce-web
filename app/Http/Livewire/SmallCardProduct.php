<?php

namespace App\Http\Livewire;

use App\CartService;
use App\Product;
use Livewire\Component;

class SmallCardProduct extends Component
{
    public $product;

    public function mount(Product $product){}

    public function render()
    {
        return view('livewire.small-card-product', [
            'added' => CartService::get($this->product->id)
        ]);
    }

    public function add()
    {
        try
        {
            $product = $this->product;
            CartService::add($product, 1);
            $this->emit('productAdded');
            session()->flash('success', $product->name . " Successfully added to cart");
        } catch (\Exception $e)
        {
        }
    }

    public function remove()
    {
        $product = $this->product;
        CartService::remove($product->id);
        $this->emit('productRemoved');

        session()->flash('success', $product->name . " Successfully removed to cart");
    }
}
