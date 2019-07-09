<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CardController extends Controller
{

    /**
     *  This function For Show Cards
     *  */ 
    public function index () {

//        dd(Cart::subtotal());
    }


    /**
     *  This function For Add New Cards
	 ** @updated_by : Abderrazzak oxa
     *  */
    public function add_to_card () {
       $product = Product::find(Request()->id);
       Cart::add(['id' => $product->id , 'name' => $product->name_and_type , 'qty' => 1 ,'price' => $product->price ,  'options' => ['category' => $product->section_id ]]);
       $card = Cart::class;
       return View('website.products.card.card')->with('card' , $card);
    }


}
