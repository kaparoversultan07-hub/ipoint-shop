<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{ 

    public function run(): void
    {
     
        User::updateOrCreate(
            ['email' => 'kaparoversultan07@gmail.com'],
            [
                'name' => 'Sultan',
                'password' => Hash::make('12345678'),
            ]
        );

        
        $category = Category::create([
            'name' => 'Apple Devices'
        ]);

        
        Product::create([
            'name' => 'iPad Air 11 M2',
            'price' => 350000,
            'description' => 'Мощный и тонкий планшет',
            'image' => 'images/ipad-air.png',
            'stock' => 10,
            'category_id' => $category->id,
        ]);

        Product::create([
            'name' => 'iPhone 17 Pro Max',
            'price' => 680000,
            'description' => 'Будущее уже здесь',
            'image' => 'images/iphone17.png',
            'stock' => 5,
            'category_id' => $category->id,
        ]);

        Product::create([
            'name' => 'Кабель USB-C (2м)',
            'price' => 12000,
            'description' => 'Быстрая зарядка',
            'image' => 'images/cable.png',
            'stock' => 100,
            'category_id' => $category->id,
        ]);
    }
}