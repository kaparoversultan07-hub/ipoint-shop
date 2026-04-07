<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказ оформлен! — ShopLaravel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">
    <div class="max-w-md w-full bg-white p-10 rounded-3xl shadow-2xl text-center">
        <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
            </svg>
        </div>
        
        <h1 class="text-3xl font-black text-gray-900 mb-2">Заказ #{{ $order->id }}</h1>
        <p class="text-gray-500 mb-8 text-lg">Спасибо, {{ $order->customer_name }}! Мы уже начали собирать ваш заказ.</p>
        
        <div class="bg-gray-50 rounded-xl p-4 mb-8 text-left">
            <p class="text-sm text-gray-400 uppercase font-bold tracking-wider mb-1">Сумма к оплате</p>
            <p class="text-2xl font-black text-gray-800">{{ number_format($order->total_price, 0, '.', ' ') }} ₽</p>
        </div>

        <a href="/" class="block w-full bg-gray-900 hover:bg-gray-800 text-white font-bold py-4 rounded-xl transition shadow-md">
            Вернуться в каталог
        </a>
    </div>
</body>
</html>