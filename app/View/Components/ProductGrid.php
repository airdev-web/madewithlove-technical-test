<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductGrid extends Component
{
    public $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function render(): View
    {
        return view('components.product-grid');
    }
}
