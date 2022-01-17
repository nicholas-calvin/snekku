<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if($validator->fails()) {
            return back()->with('error', 'Please fill the form correctly')->withErrors($validator);
        }

        // create new customer
        $new_user = new User;
        $new_user->firstName = $request->firstName;
        $new_user->lastName = $request->lastName;
        $new_user->phoneNumber = $request->phoneNumber;
        $new_user->email = $request->email;
        $new_user->password = Hash::make($request->password);
        

        $cust_role_id = Role::firstWhere('name', '=', 'Customer')->id;
        $new_user->role_id = $cust_role_id;
        
        $new_user->save();
        
        return redirect('/login')->with('success', 'Registration success!');
    }
}
