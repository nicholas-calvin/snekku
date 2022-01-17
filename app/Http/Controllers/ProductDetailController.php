<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function getProductDetails($productId){
        $details = DB::table('products')
                        ->where('products.id', 'LIKE', $productId)
                        ->get();
        $showCategory = Category::all();
        return view('productDetail', ['productDetail'=>$details, 'categories' => $showCategory]);
    }
}
