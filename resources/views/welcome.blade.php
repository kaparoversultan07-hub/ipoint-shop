<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iPoint — Официальный дилер Apple</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fbfbfd] font-sans text-[#1d1d1f] antialiased">
    
    <header class="bg-white/70 backdrop-blur-xl sticky top-0 z-50 border-b border-gray-100/50">
        <div class="max-w-7xl mx-auto px-6 h-14 flex justify-between items-center text-sm font-medium">
            <a href="/" class="text-xl font-bold tracking-tight hover:opacity-70 transition">iPoint</a>
            <div class="flex items-center space-x-6">
                <a href="/cart" class="hover:text-blue-600 transition flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 11h14l1 12H4L5 11z"></path>
                    </svg>
                    Корзина ({{ session('cart') ? count(session('cart')) : 0 }})
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto py-12 px-6">
        <div class="text-center mb-16 space-y-8">
            <h1 class="text-6xl font-black mb-10 tracking-tight leading-tight">Будущее уже здесь.</h1>
            
            <form action="/" method="GET" class="relative max-w-xl mx-auto">
                <input type="text" name="search" placeholder="Поиск по моделям..." value="{{ request('search') }}" 
                       class="w-full bg-white border-none rounded-2xl py-4 px-6 shadow-[0_10px_30px_rgba(0,0,0,0.03)] focus:ring-2 focus:ring-blue-500 transition text-lg">
                <button type="submit" class="absolute right-4 top-3.5 bg-gray-50 p-1.5 rounded-xl hover:bg-gray-100 transition"></button>
            </form>

            <div class="flex flex-wrap justify-center gap-3">
                <a href="/" class="px-6 py-2 rounded-full {{ !request('category') ? 'bg-black text-white' : 'bg-white hover:bg-gray-100' }} transition shadow-sm font-bold text-[10px] uppercase tracking-widest border border-gray-100">Все</a>
                @foreach($categories as $cat)
                    <a href="/?category={{ $cat->name }}" 
                       class="px-6 py-2 rounded-full {{ request('category') == $cat->name ? 'bg-black text-white' : 'bg-white hover:bg-gray-100' }} transition shadow-sm font-bold text-[10px] uppercase tracking-widest border border-gray-100">
                       {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
    <div class="group bg-white rounded-[2.5rem] p-6 shadow-[0_10px_40px_rgba(0,0,0,0.04)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.08)] transition-all duration-500 flex flex-col border border-gray-100/50">
        
        <a href="/product/{{ $product->id }}" class="flex-grow space-y-4 block">
            {{-- ОБНОВЛЕННЫЙ БЛОК КАРТИНКИ --}}
            <div class="h-64 flex items-center justify-center p-4 bg-[#fbfbfd] rounded-3xl overflow-hidden">
                @if($product->image)
                    <img src="{{ asset($product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="max-h-full max-w-full object-contain transition-transform duration-500 group-hover:scale-105">
                @else
                    <div class="flex flex-col items-center opacity-20">
                        <span class="text-4xl mb-2">📱</span>
                        <span class="text-gray-400 font-black uppercase text-[10px]">{{ $product->name }}</span>
                    </div>
                @endif
            </div>
            
            <div class="px-2">
                <p class="text-blue-600 text-[10px] font-bold uppercase tracking-widest mb-1">
                    {{ $product->category->name ?? 'Apple' }}
                </p>
                <h3 class="text-xl font-bold tracking-tight leading-tight group-hover:text-blue-600 transition">
                    {{ $product->name }}
                </h3>
                <p class="text-[#424245] text-xs mt-2 line-clamp-2 leading-relaxed">
                    {{ $product->description }}
                </p>
            </div>
        </a>

        <div class="mt-8 px-2 flex items-center justify-between gap-3">
            <span class="text-xl font-black whitespace-nowrap">
                {{ number_format($product->price, 0, '', ' ') }} ₸
            </span>
            
            <a href="{{ route('cart.add', $product->id) }}" 
   style="background-color: #000 !important; color: #fff !important; padding: 14px 30px; border-radius: 30px; text-decoration: none; font-weight: 800; font-size: 13px; display: block; text-align: center; text-transform: uppercase; border: none; width: 100%; max-width: 200px; visibility: visible !important; opacity: 1 !important;">
    В КОРЗИНУ
</a>
        </div>
    </div>
@empty
    <div class="col-span-full text-center py-20 text-gray-400 font-bold">Ничего не нашли </div>
@endforelse
        </div>
    </main>

    <footer class="mt-20 py-12 border-t border-gray-100 text-center">
        <p class="text-gray-400 text-[10px] uppercase tracking-widest font-bold">2026 iPoint — Официальный Apple</p>
    </footer>
</body>
</html>