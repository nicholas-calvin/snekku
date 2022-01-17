<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    
    public function showCategoryAboutus(){
        $showCategory = Category::all();
        return view('aboutUs', ['categories' => $showCategory]);
    }
    
}
