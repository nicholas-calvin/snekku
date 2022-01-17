<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $pr = Product::find($request->id);

        if($pr == null)
            return back(404);

        if($pr->stock <= 0)
            return back()->with('error', 'Stock Empty!');

        $validator = Validator::make($request->all(), [
            'quantity' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        if($pr->stock - $request->quantity < 0)
            return back()->with('error', 'Cannot exceed stock left');

        $pr->stock -= $request->quantity;
        $pr->save();

        $exists = Cart::firstWhere('product_id', '=', $request->id);

        if($exists == null) {
            $cart = new Cart;
            $cart->user_id = Auth()->id();
            $cart->product_id = $request->id;
            $cart->quantity = $request->quantity;
            $cart->save();
        } else {
            $exists->quantity += $request->quantity;
            $exists->save();
        }

        session()->flash('success', 'Product is Added');

        return redirect('/cart');
    }

    public function updateCart(Request $request)
    {
        $selected = Cart::firstWhere('id', '=', $request->id);

        if($selected == null)
            return back(404);

        $selected->quantity = $request->quantity;
        $selected->save();

        session()->flash('success', 'Cart is Updated');

        return back();
    }

    public function removeCart(Request $request)
    {
        $selected = Cart::firstWhere('id', '=', $request->id);

        if($selected == null)
            return back(404);

        $pr = Product::find($selected->product_id);
        $pr->stock += $selected->quantity;
        $pr->save();
        $selected->delete();

        session()->flash('success', 'Cart is Removed');

        return back();
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All cart is clear');

        return back();
    }

    public function showCheckoutPage() {
        $showCategory = Category::all();
        $total = 0;

        $shoppingCart = Cart::where('user_id', '=', Auth()->id())->get();
        $products = collect();

        foreach($shoppingCart as $sc) {
            $pr = Product::find($sc->product_id);
            $products->push($pr);
            $total += $pr->price * $sc->quantity;
        }

        $params['carts'] = $shoppingCart;
        $params['categories'] = $showCategory;
        $params['products'] = $products;
        $params['totalPrice'] = $total;
        
        return view('checkout', $params);
    }

    public function checkOut() {
        
        $carts = Cart::where('user_id', '=', Auth()->id())->get();

        if(count($carts) <= 0)
            return back();

        // add new transaction header
        $th = new TransactionHeader;
        $th->user_id = Auth()->id();
        $th->save();

        foreach($carts as $cart) {
            // add to new transaction detail
            $td = new TransactionDetail;
            $td->transaction_id = $th->id;
            $td->product_id = $cart->product_id;
            $td->quantity = $cart->quantity;
            $td->save();

            // delete cart
            $cart->delete();
        }

        return redirect('/home');
    }

    public function showShoppingCart(){
        $showCategory = Category::all();
        $total = 0;

        $shoppingCart = Cart::where('user_id', '=', Auth()->id())->get();
        $products = collect();

        foreach($shoppingCart as $sc) {
            $pr = Product::find($sc->product_id);
            $products->push($pr);
            $total += $pr->price * $sc->quantity;
        }

        $params['carts'] = $shoppingCart;
        $params['categories'] = $showCategory;
        $params['products'] = $products;
        $params['totalPrice'] = $total;
        
        return view('shoppingCart', $params);
    }
}
