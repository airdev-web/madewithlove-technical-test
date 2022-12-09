<x-guest>
    <div class="container mx-auto py-16">
        <x-title-h1>Produits supprimés avant commande</x-title-h1>

        <div class="grid grid-cols-1 gap-4">
            @foreach($products as $product)
                <div class="bg-stone-100 p-4 flex flex-col sm:flex-row gap-8">
                    <div class="max-h-[200px] md:max-h-[100px] overflow-hidden border mb-2">
                        <img
                            class="object-cover object-center rounded-t w-full h-full group-hover:scale-110 transition-transform duration-700"
                            src="https://picsum.photos/seed/{{ rand(1, 1000) }}/800"
                            alt="{{ Str::slug($product->name) }}">
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">{{ $product->name }}</h2>
                        <p class="text-lg mb-4">Supprimé dans les commandes :</p>
                        <div class="md:pl-8 flex flex-wrap gap-8">
                            @foreach($product->order_products as $removed_product)
                                <div class="flex flex-col gap-4 border py-2 px-4">
                                    <div>
                                        <p class="text-xs text-stone-600 text-center">{{ $removed_product->order->created_at->diffForHumans() }}</p>
                                        <p><b class="text-lg">#{{ $removed_product->order->id }}</b> - Quantité : {{ $removed_product->quantity }}x</p>
                                    </div>
                                    <a href="#" class="hover:underline text-sm text-center">Envoyer un coupon</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest>
