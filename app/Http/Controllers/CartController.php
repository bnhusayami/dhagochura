<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id)
{
    $item = Product::find($id);

    if (!$item) {
        return redirect()->back()->with('error', 'Item not found!');
    }

    // $cartItems = session()->get('cart.items', []);
    // $cartItems[] = $item->toArray();
    // session()->put('cart.items', $cartItems);

    // // Redirect back or to a different page
    // return redirect('/cart')->with('success', 'Item added to cart!');

    $cartItem = Cart::where('product_id', $id)->first();

        if ($cartItem) {
            // If the item exists, increment the quantity
            $cartItem->increment('quantity');
        } else {
            // If the item does not exist, create a new cart item
            Cart::create([
                'product_id' => $id,
            ]);
        }
        return redirect('/cart-show');
    }


    public function showCart()
    {
        $cartItems = Cart::with('product')->get();
        return view('Frontend.cart', compact('cartItems'));
    }

    public function Checkout(Request $req)
    {
    
        $store = new Order();
        $store->product_id = $req->product_id;
        $store->client_name = $req->client_name;
        $store->product_name = $req->product_name;
        $store->price = $req->product_price;
        $store->address = "kathamndu";
        $store->contact_no = $req->client_no;
        $store->payment_status = 'cash';
        $store->user_id = auth()->user()->id;
        $store->save();

        $removeCart = Cart::find($req->cart_id);
        $removeCart->delete();

        return redirect('/vieworders');
    }

}


