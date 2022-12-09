<div class="flex gap-4 items relative group">
    <div class="aspect-square max-w-[100px]">
        <img
            class="object-cover object-center rounded w-full h-full"
            src="https://picsum.photos/seed/{{ rand(1, 1000) }}/800"
            alt="{{ Str::slug($product->name) }}">
    </div>

    <div class="w-full">
        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
        <p class="mb-4">@money($product->price) / pièce</p>

        {{-- Update Quantity --}}
        <form action="{{ route('cart.update_quantity') }}" method="POST" class="flex items-center gap-2"
              x-data="{base_quantity: {{ $product->quantity }}, quantity: {{ $product->quantity }} }">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <p class="font-medium">Quantité :</p>
            <input name="quantity" id="quantity" type="number" x-model="quantity" min="1"
                   class="max-w-[50px] p-0.5 font-bold text-center outline-none"/>
            <button type="submit" x-show="quantity != base_quantity">
                <i class="fas fa-check hover:text-primary"></i>
            </button>
        </form>
    </div>

    {{-- Remove Product From Cart --}}
    <form action="{{ route('cart.remove_product') }}" method="POST"
          class="absolute top-0 right-0 text-sm hidden group-hover:block">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <button type="submit">
            <i class="fas fa-trash hover:text-primary"></i>
        </button>
    </form>
</div>
