@php use Illuminate\Support\Str; @endphp
<div class="w-full z-50 bg-stone-100 relative shadow" x-data="{show: false, cart: false}">
    <div class="w-full hidden md:flex px-8 py-2 justify-between items-center font-inter">
        <a href="{{ route('products.index') }}" class="h-[60px] block"><img src="{{ asset('img/logo.png') }}"
                                                                            class="h-full" alt=""></a>
        <div class="flex items-center space-x-8 text-lg">
            <a href="{{ route('products.index') }}" class="font-bold">Produits</a>
            <div class="font-bold relative text-xl hover:cursor-pointer" x-on:click="cart = !cart"
                 :class="cart ? 'text-stone-600' : ''">
                <i class="fas fa-cart-shopping transition-colors"></i>

                @if (session('cart', [])->count() > 0)
                    <div
                        class="rounded-full bg-primary text-white flex items-center justify-center text-xs w-4 aspect-square absolute -top-1 -right-2">
                        {{ session('cart', [])->count() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="md:hidden px-4 py-2 flex flex-col space-y-4 font-inter">
        <div class="flex justify-between items-center">
            <a href="{{ route('products.index') }}" class="h-[60px] block"><img src="{{ asset('img/logo.png') }}"
                                                                                class="h-full" alt=""></a>
            <div class="flex items-center space-x-8 px-2" x-on:click="show = !show"
                 :class="show ? 'text-3xl' : 'text-2xl'">
                <i x-show="show" class="font-bold fas fa-times"></i>
                <i x-show="!show" class="font-bold fas fa-bars"></i>
            </div>
        </div>

        <div x-show="show" x-transition.opacity class="shadow-3xl rounded-xl bg-white flex flex-col gap-4 text-lg p-4">
            <a href="{{ route('products.index') }}" class="font-bold">Produits</a>
        </div>
    </div>

    {{-- CART DISPLAY --}}
    @include('partials.cart')

    {{-- Background dark overlay when cart is open --}}
    <div x-show="cart"
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="absolute top-full w-full bg-stone-800 h-screen z-10" style="background-color: rgba(41,37,36,0.6)"></div>
</div>
