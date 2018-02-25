<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

use App\Http\Requests;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function getIndex() 
    {
    	$products = Product::all();
    	return view('shop.index', ['products' => $products]);
    }

    public function getAddToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	//dd($oldCart);
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);

    	// to put the cart back into it or in to it for the first time if we didn't have it before and than I want to serialize the card we just created 
    	$request->session()->put('cart', $cart);
    	//dd($request->session()->get('cart'));
    	return redirect()->route('product.index');
    }

    public function getCart()
    {	// check if we do not have a cart stored in the session
    	if (!Session::has('cart')) {
    		return view('shop.shoppingCart');
    	}
    	// otherwise, if we do have a cart 
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view('shop.shoppingCart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout() 
    {	// check if I do have a cart
    	if (!Session::has('cart')) {
    		return view('shop.shoppingCart');
    	}
    	// If we do have a cart
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('shop.checkout', ['total' => $total]); // we pass the total price to the view
    }

    public function postCheckout(Request $request)
    {
        // I can now handle the request which will have this hidden stripe token send with it to actually make a charge

        // check if we do have a shopping cart
        if (!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart('$oldCart');
        // if we do have the cart
        // we need to save the secret key
        Stripe::setApiKey('sk_test_1VJ55Nz9SrbRVknD94CutDsW');
        try {
            Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge Grad"
            ));
        } catch (\Exceptoin $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        // delete from the session because we checked out
        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products');
    }
}
