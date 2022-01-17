<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function addToWishlist(Request $request){
        $wl = Wishlist::firstWhere('product_id', '=', $request->id);

        if($wl == null) {
            // add to wishlist
            $wishList = new Wishlist;
            $wishList->user_id = Auth()->id();
            $wishList->product_id = $request->id;
            $wishList->save();
        }

        return redirect()->route('wishlist');
    }

    public function showWishList(){
        $wishlists = Wishlist::where('user_id', '=', Auth()->id())->get();
        $products = collect();
        $showCategory = Category::all();

        foreach($wishlists as $wl) {
            $pr = Product::find($wl->product_id);
            $products->push($pr);
        }

        $params['wishlists'] = $wishlists;
        $params['products'] = $products;
        $params['categories'] = $showCategory;
        return view('wishlist', $params);
    }

    public function deleteWishlist(Request $request) {
        $selected = Wishlist::find($request->id);

        if($selected == null)
            return back(404);

        $selected->delete();

        return back()->with('success', 'Successfully delete data');
    }

    public function deleteWishlistByProductId(Request $request) {
        $selected = Wishlist::firstWhere('product_id', '=', $request->id);

        if($selected == null)
            return back(404);

        $selected->delete();

        return back()->with('success', 'Successfully delete data');
    }
}
