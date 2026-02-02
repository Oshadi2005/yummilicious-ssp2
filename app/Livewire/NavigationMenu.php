<?php

namespace App\Livewire;

use Livewire\Component;

class NavigationMenu extends Component
{
    public int $cartCount = 0;

    protected const CART_SESSION_KEY = 'yummilicious_cart';

    protected $listeners = ['cartUpdated' => 'refreshCartCount'];

    public function mount()
    {
        $this->refreshCartCount();
    }

    public function refreshCartCount()
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        $this->cartCount = array_sum($cart);
    }

    public function render()
    {
        return view('livewire.navigation-menu');
    }
}
