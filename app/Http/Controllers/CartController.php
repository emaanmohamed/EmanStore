<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = Cart::add($request->id, $request->name, $request->price, 1);
        session()->push('cart', $cart);

        if ($product->discount != null) {
            session()->push('product', $product);
        }

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart');
    }
}
