<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Показывает таблицу с заказами
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // Срабатывает при нажатии на кнопку "Завершить"
    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed'; // Ставим статус "Выполнен"
        $order->save();

        return back()->with('success', 'Заказ #' . $id . ' успешно завершен!');
    }
}