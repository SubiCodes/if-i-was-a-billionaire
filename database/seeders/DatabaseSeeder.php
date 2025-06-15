<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Item::insert([
            [
                'item_name' => 'IPhone 16',
                'price' => 1199,
                'image' => 'https://plus.unsplash.com/premium_photo-1680985551009-05107cd2752c?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Apple Watch',
                'price' => 499,
                'image' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?q=80&w=872&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Lamborghini',
                'price' => 250000,
                'image' => 'https://images.unsplash.com/photo-1530906358829-e84b2769270f?q=80&w=1073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Yacht',
                'price' => 1500000,
                'image' => 'https://images.unsplash.com/photo-1562281302-809108fd533c?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Rolex',
                'price' => 12000,
                'image' => 'https://images.unsplash.com/photo-1600003014755-ba31aa59c4b6?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Louis Vuitton Bag',
                'price' => 3500,
                'image' => 'https://images.unsplash.com/photo-1691480288782-142b953cf664?q=80&w=880&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'White Tiger',
                'price' => 50000,
                'image' => 'https://images.unsplash.com/photo-1503066211613-c17ebc9daef0?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Overkill PC',
                'price' => 10000,
                'image' => 'https://images.unsplash.com/photo-1658262530868-f7460e2f071f?q=80&w=1034&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'iPad',
                'price' => 1099,
                'image' => 'https://images.unsplash.com/photo-1544244015-0df4b3ffc6b0?q=80&w=1115&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Mansion',
                'price' => 2500000,
                'image' => 'https://plus.unsplash.com/premium_photo-1661883982941-50af7720a6ff?q=80&w=1074&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Penthouse',
                'price' => 3500000,
                'image' => 'https://plus.unsplash.com/premium_photo-1661913412680-c274b6fea096?q=80&w=1031&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'High-end Camera',
                'price' => 6000,
                'image' => 'https://images.unsplash.com/photo-1512790182412-b19e6d62bc39?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
