<x-app-layout>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-bold text-2xl mb-6">Панель управления заказами</h2>
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Клиент</th>
                        <th class="p-4 text-left">Сумма</th>
                        <th class="p-4 text-left">Статус</th>
                        <th class="p-4 text-left">Дата</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-t">
                            <td class="p-4">#{{ $order->id }}</td>
                            <td class="p-4">{{ $order->user->name }}</td>
                            <td class="p-4">{{ $order->total_price }} руб.</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded text-sm bg-blue-100 text-blue-800">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td class="p-4">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>