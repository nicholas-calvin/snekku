<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function showProductCategory($category_id)
    {
        $showCategory = Category::all();
        $productCategory = DB::table('categories')
                            ->join('products', 'categories.id', '=', 'products.category_id')
                            ->where('categories.id', 'LIKE', $category_id)->get();
        $categoryName = Category::find($category_id)->name;

        return view('category', ['productCategories' => $productCategory, 'categories' => $showCategory, 'categoryName' => $categoryName]);
    }

    public function showAddProductPage(){
        $showCategory = Category::all();
        return view('addProduct', ['categories' => $showCategory]);
    }

    public function addProduct(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|min:0',
            'stock' => 'required|min:0',
            'image' => 'required'
        ]);

        if($validator->fails())
            return back()->withErrors($validator);

        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->stock = $request->stock;

        $file = $request->file('image');
        $fileName = uniqid().File::extension($file->getClientOriginalName());
        $relativePath = 'assets/img/'. date('Y') . '/' . date('m');
        $destinationPath = public_path().'/'.$relativePath;
        $file->move($destinationPath, $fileName);

        $product->imgPath = $relativePath.'/'.$fileName;
        $product->save();

        return redirect('/home')->with('success', 'Item successfully added.');
    }

    public function deleteProduct(Request $request){
        $selected = Product::find($request->id);

        if($selected == null)
            return back(404);

        if(File::exists($selected->imgPath)) {
            File::delete($selected->imgPath);
        }
        $selected->delete();

        return redirect('/home')->with('success', 'Item successfully deleted.');
    }

    public function updateQty(Request $request) {
        $selected = Product::find($request->id);

        if($selected == null) {
            return back(404);
        }

        $selected->stock = $request->stock;
        $selected->save();

        return back()->with('success', 'Successfully update stock.');
    }
}
