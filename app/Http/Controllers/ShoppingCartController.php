<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ShoppingCartController extends Controller
{
    public function shoppingCart() {
        $shoppingCart = (\Auth::check()) ? \Auth::user()->shoppingCarts : null;
        
        return view('pages.shoppingCart.shoppingCart', [
            'shoppingCart', $shoppingCart
        ]);
    }

    public function shoppingCartAdd(Request $request) {
        if ($request->ajax()) {
            $this->validate($request, [
                'activity_id' => 'required',
            ]);
            $activity = Activity::findOrFail($request->input('activity_id'));

            if(\Auth::check()) {
                echo 'OK';
            }
            else {
                return $activity;
            }
        }
        abort(402);
    }

    public function payment() {
        $user = \Auth::user();

        return view('pages.shoppingCart.payment', [
            'user' => $user
        ]);
    }
}
