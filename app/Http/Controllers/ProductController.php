<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product; 
use App\Models\Cart;
use App\Models\Order;
use Session;

class ProductController extends Controller
{
    //
    function  index(){
        $prod = Product::all();
        return view('product',['Products' => $prod]);
    }
    function detail($id){
        $data = Product::find($id);
        return view('detail',['product' => $data]);
    }
    function addToCart(Request $req){
        if($req->session()->has('user'))
        {
           $cart = new Cart;
           $cart->user_id = $req->session()->get('user')['id'];
           $cart->product_id = $req->product_id;
           $cart->save();
           return redirect('/');
        }
        else {
            return redirect('/login');
        }
        
    }
    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId = Session::get('user')['id'];
        $productList = DB::table('cart')    
                    ->Join('products','cart.product_id' , '=' ,'products.id')
                    ->where('cart.user_id',$userId)
                    ->select('products.*', 'cart.id as cart_id')
                    ->get();
        return view('cartlist',['products' => $productList]);
    }
    
    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function orderNow(){
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')    
                    ->Join('products','cart.product_id' , '=' ,'products.id')
                    ->where('cart.user_id',$userId)
                    ->sum('products.price');
        return view('ordernow',['total' => $total]);
    }
    function orderPlace(Request $req){
        $userId = Session::get('user')['id'];
        $cardElements  = Cart::where('user_id', $userId)->get();
        foreach($cardElements as $element) {
            $order = new Order();
            $order->product_id = $element['product_id'];
            $order->user_id = $element['user_id'];
            $order->status ="Pending";
            $order->payment_method = $req->payment_method;
            $order->payment_status = "Pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();


        }
        $req->input();
        return redirect('/');
    } 
}
