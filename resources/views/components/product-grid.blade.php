<div class="rounded pb-4 bg-stone-100 group">
    <div class="max-h-[300px] overflow-hidden border mb-2">
        <img
            class="object-cover object-center rounded-t w-full h-full group-hover:scale-110 transition-transform duration-700"
            src="https://picsum.photos/seed/{{ rand(1, 1000) }}/800" alt="">
    </div>

    <div class="px-4">
        <p class="text-2xl font-bold mb-4">@money($product->price)</p>
        <h2 class="text-lg font-medium mb-8">{{ $product->name }}</h2>

        <div class="flex justify-between items-center">
            <p class="text-xs italic">Ajouter au panier</p>
            <form action="#" method="POST" class="flex border w-fit">
                <input name="quantity" id="quantity" type="number" value="1"
                       class="max-w-[50px] p-2 font-bold text-center outline-none"/>
                <button class="py-2 px-4 hover:bg-stone-200"><i class="fas fa-cart-plus text-xl"></i></button>
            </form>
        </div>
    </div>
</div>
