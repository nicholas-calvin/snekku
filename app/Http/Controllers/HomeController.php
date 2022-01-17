<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function showHome(){
        $productList = Product::all();
        $showCategory = Category::all();
        return view('home', ['products'=>$productList, 'categories' => $showCategory]);
    }
}
