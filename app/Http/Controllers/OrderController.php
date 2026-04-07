<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function create()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Ваша корзина пуста');
        }
        
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        
        return view('order.create', compact('cart', 'total'));
    }


    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('home')->with('error', 'Нельзя оформить пустой заказ');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $cart) {
            
            $order = Order::create([
                'user_id'       => auth()->id(), 
                'customer_name' => $request->name,
                'phone'         => $request->phone,
                'address'       => $request->address,
                'total_price'   => array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)),
                'status'        => 'new'
            ]);

            foreach ($cart as $id => $details) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $id,
                    'quantity'   => $details['quantity'],
                    'price'      => $details['price'],
                ]);
            }
        });

        session()->forget('cart');

        return redirect('/')->with('success', 'Заказ успешно оформлен! Ожидайте звонка.');
    }
}