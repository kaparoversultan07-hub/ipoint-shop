<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Корзина — iPoint</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .black-button-fix {
            background-color: #000000 !important;
            color: #ffffff !important;
            display: block !important;
            width: 100% !important;
            padding: 20px 0 !important;
            border-radius: 40px !important;
            text-align: center !important;
            font-weight: 800 !important;
            font-size: 16px !important;
            text-decoration: none !important;
            border: none !important;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
            transition: all 0.2s ease !important;
        }
        .black-button-fix:hover {
            opacity: 0.8 !important;
            transform: translateY(-2px) !important;
        }
    </style>
</head>
<body class="bg-[#fbfbfd] font-sans text-[#1d1d1f] antialiased">
    
    <header class="bg-white/70 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-14 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight">iPoint</a>
            <a href="/" class="text-blue-600 text-sm font-bold hover:underline">В магазин</a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto py-10 px-6">
        <h1 class="text-4xl font-bold mb-8 tracking-tight">Ваша корзина.</h1>

        @php 
            $cart = session('cart', []);
            $total = 0;
        @endphp

        @if(count($cart) > 0)
            <div class="bg-white rounded-[2.5rem] shadow-sm border border-gray-100 overflow-hidden">
                
                <div class="divide-y divide-gray-50">
                    @foreach($cart as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                        <div class="flex items-center gap-6 p-8">
                            <div class="w-20 h-20 flex-shrink-0 bg-[#f5f5f7] rounded-xl p-2 flex items-center justify-center">
                                <img src="{{ asset($details['image']) }}" class="max-w-full max-h-full object-contain">
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-lg leading-tight">{{ $details['name'] }}</h3>
                                <p class="text-gray-400 text-xs font-bold uppercase tracking-widest mt-1">Кол-во: {{ $details['quantity'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-black text-lg">{{ number_format($details['price'], 0, '', ' ') }} ₸</p>
                                <a href="{{ route('cart.remove', $id) }}" class="text-red-500 text-[10px] font-bold uppercase tracking-widest hover:underline">Удалить</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="p-8 bg-[#f5f5f7]/50 border-t border-gray-100">
                    <div class="flex justify-between items-end mb-8">
                        <div>
                            <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1">Итого к оплате</p>
                            <p class="text-3xl font-black">{{ number_format($total, 0, '', ' ') }} ₸</p>
                        </div>
                    </div>
                    <a href="/checkout" class="black-button-fix">
                        Оформить заказ
                    </a>
                </div>
            </div>

        @else
            <div class="text-center py-20 bg-white rounded-[2.5rem] border border-dashed">
                <p class="text-xl font-bold mb-4">Корзина пуста</p>
                <a href="/" class="text-blue-600 font-bold">На главную</a>
            </div>
        @endif
    </main>
</body>
</html>