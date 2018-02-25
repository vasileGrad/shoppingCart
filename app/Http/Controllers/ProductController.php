<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

use App\Http\Requests;
use Session;

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
}
