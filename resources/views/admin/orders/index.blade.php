<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>iPoint Admin — Заказы</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfbfd] p-10 font-sans">
    <div class="max-w-6xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-black">Управление заказами</h1>
            <a href="/" class="text-blue-600 font-bold hover:underline">← В магазин</a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500 text-white rounded-xl font-bold">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-400 uppercase font-black text-[10px] tracking-widest">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Клиент</th>
                        <th class="px-6 py-4">Сумма</th>
                        <th class="px-6 py-4">Статус / Действие</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-6 font-mono text-gray-400">#{{ $order->id }}</td>
                        <td class="px-6 py-6">
                            <div class="font-bold text-gray-900">{{ $order->customer_name }}</div>
                            <div class="text-xs text-gray-500">{{ $order->phone }}</div>
                        </td>
                        <td class="px-6 py-6 font-black text-lg">{{ number_format($order->total_price, 0, '', ' ') }} ₸</td>
                        
                        <td class="px-6 py-6">
                            @if($order->status !== 'completed')
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-black text-white px-5 py-2 rounded-full text-[10px] font-black uppercase tracking-widest hover:bg-gray-800 transition">
                                        Завершить
                                    </button>
                                </form>
                            @else
                                <span class="text-green-500 font-black text-[10px] uppercase tracking-widest flex items-center gap-1">
                                    <span class="text-lg">✓</span> Выполнен
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8 text-center">
            {{ $orders->links() }}
        </div>
    </div>
</body>
</html>