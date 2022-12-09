@php use Illuminate\Support\Str; @endphp
<div class="fixed top-0 w-full z-50 h-[75px] bg-stone-100 shadow" x-data="{show: false, cart: false}">
    <div class="w-full hidden md:flex px-8 py-2 justify-between items-center font-inter">
        <a href="{{ route('home') }}" class="h-[60px] block"><img src="{{ asset('img/logo.png') }}"
                                                                            class="h-full" alt=""></a>
        <div class="flex items-center space-x-8 text-lg">
            <a href="{{ route('products.index') }}" class="font-bold">Produits</a>
            <a href="{{ route('admin.products.removed') }}" class="font-bold">Produits supprimés</a>
            <x-cart-menu-button></x-cart-menu-button>
        </div>
    </div>

    <div class="md:hidden py-2 flex flex-col font-inter">
        <div class="flex justify-between items-center gap-8 px-4">
            <a href="{{ route('home') }}" class="h-full w-auto block"><img src="{{ asset('img/logo.png') }}"
                                                                                class="h-full max-h-[60px]" alt=""></a>

            <div class="flex items-center gap-4">
                <x-cart-menu-button></x-cart-menu-button>
                <div class="flex items-center" x-on:click="show = !show"
                     :class="show ? 'text-3xl' : 'text-2xl'">
                    <i x-show="show" class="font-bold fas fa-times"></i>
                    <i x-show="!show" class="font-bold fas fa-bars"></i>
                </div>
            </div>
        </div>

        <div x-show="show" x-transition.opacity class="shadow-3xl bg-white flex flex-col gap-4 text-lg py-4 px-8 bg-stone-100 border-t">
            <a href="{{ route('products.index') }}" class="font-bold">Produits</a>
            <a href="{{ route('admin.products.removed') }}" class="font-bold">Produits supprimés</a>
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
         class="hidden md:block absolute top-full w-full bg-stone-800 h-screen z-10" style="background-color: rgba(41,37,36,0.6)"></div>
</div>
