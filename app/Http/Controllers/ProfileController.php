<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function showCategoryAdmin(){
        $showCategory = Category::all();
        return view('admin', ['categories' => $showCategory]);
    }

    public function showUserData(){
        $userData = User::all();
        $showCategory = Category::all();
        return view('profile', ['categories' => $showCategory, 'users' =>$userData]);
    }
}
