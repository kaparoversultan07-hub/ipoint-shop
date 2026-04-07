<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} — iPoint</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade { animation: fadeIn 0.8s ease-out forwards; }
    </style>
</head>
<body class="bg-[#fbfbfd] font-sans text-[#1d1d1f] antialiased">
    
    <header class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100/50">
        <div class="max-w-7xl mx-auto px-6 h-14 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-tight hover:opacity-70 transition">iPoint</a>
            <div class="flex items-center space-x-6">
                <a href="/cart" class="hover:text-blue-600 transition flex items-center gap-2 text-sm font-semibold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 11h14l1 12H4L5 11z"></path>
                    </svg>
                    <span>Корзина ({{ session('cart') ? count(session('cart')) : 0 }})</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto py-8 md:py-12 px-6">
        
        <div class="mb-8">
            <a href="/" 
               style="display: inline-flex; align-items: center; gap: 6px; color: #050708; text-decoration: none; font-size: 14px; font-weight: 500;"
               onmouseover="this.style.textDecoration='underline'" 
               onmouseout="this.style.textDecoration='none'">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                Вернуться в магазин
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-20 items-start">
            
            <div class="bg-white rounded-[2.5rem] p-8 md:p-12 flex items-center justify-center shadow-sm border border-gray-100 md:sticky md:top-24 overflow-hidden group">
                @if($product->image)
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="max-h-[500px] w-auto object-contain transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                @else
                    <div class="text-center py-32 opacity-20">
                        <span class="text-8xl block mb-4">📦</span>
                        <p class="font-bold uppercase tracking-widest text-xs text-black">Фото отсутствует</p>
                    </div>
                @endif
            </div>

            <div class="space-y-10 animate-fade">
                <div>
                    <p class="text-orange-500 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">
                        Новинка • В наличии: {{ $product->stock }}
                    </p>
                    <h1 class="text-5xl font-bold tracking-tight mb-2 leading-tight">
                        {{ $product->name }}
                    </h1>
                    <p class="text-2xl text-gray-400 font-medium">{{ $product->category->name }}</p>
                </div>

                <div class="border-t border-gray-100 pt-10">
                    <h2 class="text-[11px] font-bold uppercase mb-4 text-gray-400 tracking-widest text-black">О продукте</h2>
                    <p class="text-lg leading-relaxed text-[#424245]">
                        {{ $product->description }}
                    </p>
                    
                    <div class="flex flex-wrap gap-2 mt-8">
                        <span class="bg-[#f5f5f7] px-4 py-2 rounded-full text-[12px] font-semibold">Apple Intelligence</span>
                        <span class="bg-[#f5f5f7] px-4 py-2 rounded-full text-[12px] font-semibold">Гарантия 1 год</span>
                        <span class="bg-[#f5f5f7] px-4 py-2 rounded-full text-[12px] font-semibold text-black">iPoint Care+</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2.5rem] flex flex-col sm:flex-row items-center justify-between gap-6 shadow-sm border border-gray-50 mt-12">
                    <div class="flex flex-col text-center sm:text-left px-2">
                        <span class="text-gray-400 text-[10px] font-bold uppercase tracking-widest mb-1 text-black">Цена</span>
                        <span class="text-3xl font-black tracking-tight whitespace-nowrap">
                            {{ number_format($product->price, 0, '', ' ') }} ₸
                        </span>
                    </div>
                    
                    <a href="{{ route('cart.add', $product->id) }}" 
                       style="background-color: #000 !important; color: #fff !important; padding: 16px 32px; border-radius: 40px; text-decoration: none; font-weight: 800; font-size: 13px; display: inline-block; text-transform: uppercase; border: none; box-shadow: 0 10px 20px rgba(0,0,0,0.1); transition: transform 0.2s;"
                       onmouseover="this.style.transform='scale(1.02)'"
                       onmouseout="this.style.transform='scale(1)'">
                        В КОРЗИНУ
                    </a>
                </div>

                <div class="flex items-start gap-3 opacity-50 px-4">
                    <svg class="w-5 h-5 text-green-600 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <p class="text-[11px] font-medium leading-relaxed">
                        Официальный товар в Казахстане. Бесплатная доставка по всему Казахстану.Гарантия 1 год.
                    </p>
                </div>
            </div>
        </div>
    </main>

    <footer class="py-12 border-t border-gray-100 mt-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">
                 2026 iPoint — Официальный Apple.
            </p>
        </div>
    </footer>

</body>
</html>