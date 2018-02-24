<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
        	'imagePath' => 'http://i0.wp.com/thehogshead.org/wp-content/uploads/2013/10/w620-1a3546192fa56326fabe069f8097c4c91.jpg?fit=604%2C893',
        	'title'     => 'Harry Potter', 
        	'description' => 'Super cool book - at least as a child',
        	'price' => 19.99
        ]);
        $product->save();
        $product = new \App\Product([
        	'imagePath' => 'https://bookzone.boyslife.org/100-books-for-boys/lordrings/',
        	'title'     => 'The Lord of the Rings', 
        	'description' => 'This is a super nice book - for everybody',
        	'price' => 39.50
        ]);
        $product->save();
        $product = new \App\Product([
        	'imagePath' => 'https://growingbookbybook.com/wp-content/uploads/2013/10/pete-the-cat.png',
        	'title'     => 'Pete the Cat', 
        	'description' => 'Only for kids',
        	'price' => 20.12
        ]);
        $product->save();
        $product = new \App\Product([
        	'imagePath' => 'https://www.rd.com/wp-content/uploads/2016/03/04-classic-books-twilight.jpg',
        	'title'     => 'Forks', 
        	'description' => 'Very important book to read and to see the life',
        	'price' => 16.12
        ]);
        $product->save();
        $product = new \App\Product([
        	'imagePath' => 'https://images.gr-assets.com/books/1395795674l/19286536.jpg',
        	'title'     => 'Party Games', 
        	'description' => 'We like to read and to see the life',
        	'price' => 32.14
        ]);
        $product->save();

    }
}
