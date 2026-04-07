<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Оформление заказа — iPoint</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfbfd] text-[#1d1d1f] antialiased">
    <div class="max-w-3xl mx-auto py-20 px-6">
        <a href="/cart" class="text-blue-600 hover:underline mb-8 inline-block font-medium">← Вернуться к корзине</a>
        
        <h1 class="text-5xl font-black mb-12 tracking-tight">Доставка.</h1>

        <form action="{{ route('order.store') }}" method="POST" class="space-y-8">
            @csrf
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 space-y-6">
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Ваше имя</label>
                    <input type="text" name="name" required class="w-full bg-[#f5f5f7] border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500 transition shadow-inner">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Контактный телефон</label>
                    <input type="text" name="phone" required placeholder="+7" class="w-full bg-[#f5f5f7] border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500 transition shadow-inner">
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-widest text-gray-400 mb-2 ml-1">Адрес доставки</label>
                    <textarea name="address" required rows="3" placeholder="Город, улица, дом, квартира" class="w-full bg-[#f5f5f7] border-none rounded-2xl py-4 px-6 focus:ring-2 focus:ring-blue-500 transition shadow-inner"></textarea>
                </div>
            </div>

            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-gray-100 flex items-center justify-between">
                <div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">К оплате</p>
                    <p class="text-3xl font-black">{{ number_format($total, 0, '', ' ') }} ₸</p>
                </div>
                <button type="submit" style="background-color: #0071e3 !important; color: white !important;" class="px-12 py-5 rounded-full font-bold text-lg hover:bg-[#0077ed] transition transform active:scale-95 shadow-xl shadow-blue-100">
                    Подтвердить заказ
                </button>
            </div>
        </form>
    </div>
</body>
</html>