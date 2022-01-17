<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransaction($product_id)
    {
        $transaction = Product::join('categories', 'categories.id', '=', 'products.category_id')
        ->join('products', 'products.id' , '=', 'transactiondetails.product_id')
        ->join('transactionheaders', 'transactionheaders.id', '=', 'transactiondetails.transaction_id')
        ->where('transactiondetails.id', $product_id)->get();


        $params['transactiondetail'] = $transaction;
        return view('transactiondetail', $params);
    }

    public function showCategorytransactionHistory(){
        // $showCategory = Category::all();
        // return view('historyTransaction', ['categories' => $showCategory]);
        $total = 0;

        $histories = TransactionHeader::where('user_id', '=', Auth()->id())->get();
        $transactiondetails = collect();
        $transaction_details = TransactionDetail::all();
        $products = Product::all();
        $showCategory = Category::all();
    
        foreach($histories as $hs) {
            $tr = TransactionDetail::find($hs->transaction_id);
            $transactiondetails->push($tr);
            $pr = Product::find($hs->product_id);
            $products->push($pr);
            $total += $hs->price * $hs->quantity;
        }
    
        $params['histories'] = $histories;
        $params['products'] = $products;
        $params['transactiondetails'] = $transactiondetails;
        $params['transaction_details'] = $transaction_details;
        $params['categories'] = $showCategory;
        $params['totalPrice'] = $total;

        return view('historyTransaction', $params);
    }
}
