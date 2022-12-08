<x-guest>
    <div class="container mx-auto py-16">
        <h1 class="text-4xl font-bold mb-16 text-center">Produits</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($products as $product)
                <x-product-grid :product="$product"></x-product-grid>
            @endforeach
        </div>
    </div>
</x-guest>
