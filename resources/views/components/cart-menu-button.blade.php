<div class="font-bold relative text-xl hover:cursor-pointer" x-on:click="cart = !cart; show = false"
     :class="cart ? 'text-stone-600' : ''">
    <i class="fas fa-cart-shopping transition-colors"></i>

    @if (session('cart', collect())->where('removed', '!=', 'true')->count() > 0)
        <div
            class="rounded-full bg-primary text-white flex items-center justify-center text-xs w-4 aspect-square absolute -top-1 -right-2">
            {{ session('cart', collect())->where('removed', '!=', 'true')->count() }}
        </div>
    @endif
</div>
