<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\UserItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DisplayItems extends Component
{
    public $user_items;
    public $items;

    public function mount()
    {
        $this->user_items = collect(Auth::user()->userItems()->get());
        $this->items = collect(Item::all());
    }

    public function addItem($item_id)
    {
        $user_id = Auth::id();

        $userItem = $this->user_items->firstWhere('item_id', $item_id);

        if ($userItem) {
            $userItem->increment('amount');
        } else {
            $newItem = UserItem::create([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'amount' => 1,
            ]);
            $this->user_items->push($newItem);
        }

        $item = $this->items->firstWhere('id', $item_id);
        if ($item) {
            $this->dispatch('itemBought', price: $item->price);
        }
    }

    public function subtractItem($item_id)
    {
        $user_id = Auth::id();

        $userItem = $this->user_items->firstWhere('item_id', $item_id);

        if ($userItem) {
            if ($userItem->amount > 0) {
                $userItem->decrement('amount');
                $item = $this->items->firstWhere('id', $item_id);
                if ($item) {
                    $this->dispatch('itemSold', price: $item->price);
                }
            }
        } else {

        }
    }

    public function render()
    {
        return view('livewire.display-items', [
            'items' => Item::all()
        ]);
    }
}
