<?php
namespace App\Http\Helpers;

use App\Models\Role;
use App\Models\Wishlist;

class Helper {
    public static function getAdminRoleId() {
        $admin_id = Role::firstWhere('name', '=', 'Admin')->id;
        return $admin_id;
    }

    public static function getCustomerRoleId() {
        $cust_id = Role::firstWhere('name', '=', 'Customer')->id;
        return $cust_id;
    }

    public static function isAddedToWishlist($id) {
        $wl = Wishlist::where('product_id', '=', $id)->where('user_id', '=', Auth()->id())->get();
        if(count($wl) <= 0) {
            return false;
        } 
        return true;
    }
}