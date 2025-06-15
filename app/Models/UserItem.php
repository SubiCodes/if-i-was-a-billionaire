<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    /** @use HasFactory<\Database\Factories\UserItemFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'item_id', 'amount'];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
