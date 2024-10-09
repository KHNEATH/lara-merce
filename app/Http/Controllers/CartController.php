<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index() 
    {
        $carts = Cart::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        
        $subTotal = 0.0;
        $total = 0.0;
        foreach ($carts as $cart) {
            $subTotal += $cart->total;
            $total += $cart->total;
        }
        
        return view('pages.carts.index', [ 
            'carts' => $carts,
            'subTotal' => $subTotal,
            'total' => $total
        ]);
    }
    
    // public function store(Product $product, Request $request)
    // {
    //     Cart::create([
    //         'user_id' => Auth::id(),
    //         'product_id'=> $product->id,
    //         'qty'=> 1,
    //         'total' => $product->getTotalPrice(1)
    //     ]);

    //     return redirect(route('carts.index'));
    // }

    public function store(Product $product, Request $request)
    {
        // Check if the product already exists in the user's cart
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $product->id)
                            ->first();

        if ($existingCart) {
            // Update the quantity and total if the product already exists
            $existingCart->qty += 1;
            $existingCart->total = $product->getTotalPrice($existingCart->qty);
            $existingCart->save();
        } else {
            // Create a new cart entry if the product doesn't exist in the cart
            Cart::create([
                'user_id' => Auth::id(),
                'product_id'=> $product->id,
                'qty'=> 1,
                'total' => $product->getTotalPrice(1)
            ]);
        }

        return redirect(route('carts.index'));
    }

    public function destroy(Cart $cart)
    {
        $cart -> delete();
        return redirect(route('carts.index'));
    }
    
    public function updateQuantity(Cart $cart, Request $request)
    {
        $qty=intval($request->get('new_qty'));
        $cart->qty=$qty < 1 ? 1 : $qty;
        $cart->total = $cart->product->getTotalPrice($cart->qty);
        $cart->save();
        return redirect(route('carts.index'));
    }
}
