<div x-show="cart"
     x-on:click.away="cart = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="translate-x-full"
     x-transition:enter-end="translate-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="translate-0"
     x-transition:leave-end="translate-x-full"
     class="fixed top-[75px] right-0 w-full md:max-w-[450px] bg-stone-200 h-screen z-20">

    <div class="p-8">
        <x-title-h2><i class="fas fa-cart-shopping mr-2"></i> Panier</x-title-h2>

        <div class="w-full grid grid-cols-1 gap-8">
            @forelse (session('cart', collect()) as $product)
                <x-product-cart :product="$product"></x-product-cart>
            @empty
                <p class="text-center">
                    Vous n'avez aucun article dans votre panier pour le moment.<br>
                    <a class="font-bold hover:underline" href="{{ route('products.index') }}">Découvrez nos produits</a>
                </p>
            @endforelse

        </div>
    </div>
</div>
