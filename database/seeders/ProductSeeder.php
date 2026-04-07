<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $c = [
            'iPhone' => Category::updateOrCreate(['name' => 'iPhone']),
            'iPad' => Category::updateOrCreate(['name' => 'iPad']),
            'Watch' => Category::updateOrCreate(['name' => 'Watch']),
            'Acc' => Category::updateOrCreate(['name' => 'Аксессуары']),
        ];

        $products = [
            ['cat'=>'iPhone', 'name'=>'iPhone 17', 'price'=>450000, 'img'=>'images/iphone-17.jpg', 'desc'=>'Новый iPhone 17 — мощный и стильный смартфон с OLED-экраном 6.1", камерой 48 МП и чипом A18. Память: 128/256/512 ГБ.'],
            ['cat'=>'iPhone', 'name'=>'iPhone 17 Plus', 'price'=>490000, 'img'=>'images/iphone-17-plus.jpg', 'desc'=>'iPhone 17 Plus с большим экраном 6.7" для максимального комфорта. Чип A18, камера 48 МП. Память: 128/256/512 ГБ.'],
            ['cat'=>'iPhone', 'name'=>'iPhone 17 Pro', 'price'=>580000, 'img'=>'images/iphone-17-pro.jpg', 'desc'=>'Премиальный iPhone 17 Pro с ProMotion дисплеем 6.1", профессиональной камерой и чипом A18 Pro. Память: 256/512 ГБ / 1 ТБ.'],
            ['cat'=>'iPhone', 'name'=>'iPhone 17 Pro Max', 'price'=>680000, 'img'=>'images/iphone-17-pro-max.jpg', 'desc'=>'Флагманский iPhone 17 Pro Max с экраном 6.9", топовой камерой и лучшей автономностью. Чип A18 Pro. Память: 256/512 ГБ / 1 ТБ.'],
            ['cat'=>'iPhone', 'name'=>'iPhone 17 Air', 'price'=>520000, 'img'=>'images/iphone-17-air.jpg', 'desc'=>'iPhone 17 Air — ультратонкий и лёгкий смартфон с экраном 6.6" и чипом A18. Память: 128/256/512 ГБ.'],

            ['cat'=>'iPad', 'name'=>'iPad Pro 13 M4', 'price'=>750000, 'img'=>'images/ipad-pro-13-m4.jpg', 'desc'=>'iPad Pro 13 M4 — мощный планшет с OLED-дисплеем и чипом M4. Память: 256/512 ГБ / 1 ТБ / 2 ТБ.'],
            ['cat'=>'iPad', 'name'=>'iPad Pro 11 M4', 'price'=>700000, 'img'=>'images/ipad-pro-11-m4.jpg', 'desc'=>'Компактный iPad Pro 11 M4 с мощным чипом M4. Память: 256/512 ГБ / 1 ТБ / 2 ТБ.'],
            ['cat'=>'iPad', 'name'=>'iPad Air 13 M2', 'price'=>400000, 'img'=>'images/ipad-air-13-m2.jpg', 'desc'=>'iPad Air 13 M2 — большой, лёгкий и быстрый планшет. Память: 128/256/512 ГБ / 1 ТБ.'],
            ['cat'=>'iPad', 'name'=>'iPad Air 11 M2', 'price'=>350000, 'img'=>'images/ipad-air-11-m2.jpg', 'desc'=>'Универсальный iPad Air 11 M2 с отличной производительностью. Память: 128/256/512 ГБ / 1 ТБ.'],
            ['cat'=>'iPad', 'name'=>'iPad 10.9 (2022)', 'price'=>250000, 'img'=>'images/ipad-10-9-2022.jpg', 'desc'=>'iPad 10.9 — доступный и надёжный планшет. Память: 64/256 ГБ.'],
            ['cat'=>'iPad', 'name'=>'iPad mini 6', 'price'=>280000, 'img'=>'images/ipad-mini-6.jpg', 'desc'=>'Компактный iPad mini 6 с экраном 8.3". Память: 64/256 ГБ.'],

            ['cat'=>'Acc', 'name'=>'Адаптер питания 20W', 'price'=>15000, 'img'=>'images/adapter-20w.jpg', 'desc'=>'Оригинальный адаптер 20W для быстрой зарядки iPhone. Компактный и надёжный.'],
            ['cat'=>'Acc', 'name'=>'Адаптер питания 35W', 'price'=>25000, 'img'=>'images/adapter-35w.jpg', 'desc'=>'Мощный адаптер 35W с двумя портами USB-C. Можно заряжать сразу два устройства.'],
            ['cat'=>'Acc', 'name'=>'Кабель USB-C (2м)', 'price'=>12000, 'img'=>'images/usb-c-cable-2m.jpg', 'desc'=>'Кабель USB-C длиной 2 метра для быстрой зарядки и передачи данных.'],
            ['cat'=>'Acc', 'name'=>'MagSafe Charger', 'price'=>25000, 'img'=>'images/magsafe-charger.jpg', 'desc'=>'Беспроводная зарядка MagSafe с магнитным креплением.'],
            ['cat'=>'Acc', 'name'=>'Кабель MagSafe 3', 'price'=>18000, 'img'=>'images/magsafe-3-cable.jpg', 'desc'=>'Магнитный кабель MagSafe 3 для безопасной зарядки MacBook.'],

            ['cat'=>'Watch', 'name'=>'Apple Watch Ultra 2', 'price'=>490000, 'img'=>'images/apple-watch-ultra-2.jpg', 'desc'=>'Apple Watch Ultra 2 — премиальные часы с защитой, GPS и автономностью до 36 часов.'],
            ['cat'=>'Watch', 'name'=>'Apple Watch SE 2', 'price'=>140000, 'img'=>'images/apple-watch-se-2.jpg', 'desc'=>'Apple Watch SE 2 — доступные часы с функциями фитнеса и уведомлений.'],
            ['cat'=>'Watch', 'name'=>'Apple Watch Series 10', 'price'=>220000, 'img'=>'images/apple-watch-series-10.jpg', 'desc'=>'Apple Watch Series 10 — современные часы с Always-On дисплеем.'],
        ];

        foreach ($products as $p) {
            Product::updateOrCreate(
                ['name' => $p['name']],
                [
                    'category_id' => $c[$p['cat']]->id,
                    'price' => $p['price'],
                    'image' => $p['img'],
                    'description' => $p['desc'], 
                    'stock' => 50
                ]
            );
        }
    }
}