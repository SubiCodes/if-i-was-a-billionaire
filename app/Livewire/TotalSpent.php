<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class TotalSpent extends Component
{
    public $totalMoneySpent;
    public function mount()
    {
        $userItems = Auth::user()->userItems()->get();
        $items = Item::all();
        $totalSpent = 0;
        foreach ($userItems as $userItem) {
            $item = $items->firstWhere('id', $userItem->item_id);
            if ($item) {
                $totalSpent += $userItem->amount * $item->price;
            }
        }
        $this->totalMoneySpent =  $totalSpent;
    }
    #[On('itemBought')]
    public function itemBought($price)
    {
        $this->totalMoneySpent = $this->totalMoneySpent + $price;
    }
    #[On('itemSold')]
    public function itemSold($price)
    {
        $this->totalMoneySpent = $this->totalMoneySpent - $price;
    }

    public function render()
    {
        return view('livewire.total-spent');
    }
}
