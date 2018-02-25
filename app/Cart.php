<?php

namespace App;

class Cart
{
    public $items = null;// group of products
    public $totalQty = 0;
    public $totalPrice = 0;

    // Constructor that it allows me to recreate this cart based on the oldCart so that information gets lost
    public function __construct($oldCart)
    {
    	if ($oldCart) {
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}
    }

    public function add($item, $id) {
    	// the group
    	$storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
    	// check that in the items I already have in the cart
    	if ($this->items) {
    		// I check if I already have this item
    		if (array_key_exists($id, $this->items)) {
    			$storedItem = $this->items[$id]; // accociative array  - we only override the information
    		}
    	}
    	$storedItem['qty']++;
    	$storedItem['price'] = $item->price * $storedItem['qty'];
    	$this->items[$id] = $storedItem;
    	$this->totalQty++;
    	$this->totalPrice += $item->price;
    }
}
