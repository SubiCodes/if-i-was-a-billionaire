<?php

namespace App\Livewire;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class RemainingMoney extends Component
{
    public $totalMoneyLeft;
    public function mount() 
    {
        $userItems = Auth::user()->userItems()->get();
        $items = Item::all();
        $totalSpent = 0;
        foreach ($userItems as $userItem) 
        {
            $item = $items->firstWhere('id', $userItem->item_id);
            if ($item) 
            {
                $totalSpent += $userItem->amount * $item->price;
            }
        }
        $this->totalMoneyLeft = 1000000000 - $totalSpent;
    }
    #[On('itemBought')]
    public function itemBought($price)
    {
        $this->totalMoneyLeft = $this->totalMoneyLeft - $price;
    }
    #[On('itemSold')]
    public function itemSold($price)
    {
        $this->totalMoneyLeft = $this->totalMoneyLeft + $price;
    }
    public function render()
    {
        return view('livewire.remaining-money');
    }
}
