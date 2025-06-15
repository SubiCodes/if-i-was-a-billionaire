<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\User;
use App\Models\UserItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserList extends Component
{
    public $searchedUser = '';
    public $items;
    public $user;
    public $userRemainingMoney;
    public $userTotalSpent;
    public $userItems;
    public $boughtItems;
    public $viewUser = false;

    public function selectUser($userId)
    {
        $this->user = User::find($userId);
        $userItems = UserItem::with('item')->where('user_id', $userId)->get();

        $totalSpent = 0;
        $this->boughtItems = $userItems->map(function ($userItem) use (&$totalSpent) {
            $item = $userItem->item; // item comes from the with('item') relation

            if ($item) {
                $itemTotal = $userItem->amount * $item->price;
                $totalSpent += $itemTotal;

                return (object) [
                    'id' => $item->id,
                    'item_name' => $item->item_name,
                    'price' => $item->price,
                    'amount' => $userItem->amount,
                    'total' => $itemTotal,
                ];
            }

            return null; 
        })->filter();
        
        $this->userTotalSpent = $totalSpent;
        $this->userRemainingMoney = 1000000000 - $totalSpent;
        $this->viewUser = true;
    }

    public function closeModal()
    {
        $this->viewUser = false;
    }
    public function mount()
    {
        $this->items = Item::all();
    }

    public function render()
    {
        $filteredUsers = User::where('id', '!=', Auth::id())
            ->when($this->searchedUser, function ($query) {
                $query->where('name', 'like', '%' . $this->searchedUser . '%');
            })
            ->get();

        $userItemsGrouped = UserItem::whereIn('user_id', $filteredUsers->pluck('id'))
            ->get()
            ->groupBy('user_id');

        foreach ($filteredUsers as $user) {
            $userItems = $userItemsGrouped->get($user->id, collect());

            $total = 0;
            foreach ($userItems as $userItem) {
                $item = $this->items->firstWhere('id', $userItem->item_id);
                if ($item) {
                    $total += $userItem->amount * $item->price;
                }
            }

            $user->total_expense = $total;
        }

        return view('livewire.user-list', [
            'users' => $filteredUsers
        ]);
    }
}
