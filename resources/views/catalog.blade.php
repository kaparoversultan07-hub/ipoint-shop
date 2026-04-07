<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-6">
                <div class="w-1/4">
                    <h3 class="font-bold mb-4">Категории</h3>
                    @foreach($categories as $cat)
                        <a href="?category={{ $cat->slug }}" class="block p-2 hover:bg-gray-100">{{ $cat->name }}</a>
                    @endforeach
                </div>
                <div class="w-3/4 grid grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white p-4 shadow rounded">
                            <h4 class="font-bold">{{ $product->name }}</h4>
                            <p class="text-gray-600">{{ $product->price }} руб.</p>
                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">В корзину</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-6">{{ $products->links() }}</div>
        </div>
    </div>
</x-app-layout>