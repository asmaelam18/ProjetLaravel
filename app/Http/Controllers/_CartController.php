<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function addToCart(Request $request)
    {
        // \Cart::add([
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->quantity,
        //     'attributes' => array(
        //         'image' => $request->image,
        //     )
        // ]);
        // session()->flash('success', 'Product is Added to Cart Successfully !');

        // return redirect()->route('cart.list');
        $book=Book::findOrFaill($request->input(key:'id'));
        echo "hi".$request->id;
        Cart::add([
            $book->id,
            $book->title,
            $book->price,
            $book->img,
        ]);
    }

}
