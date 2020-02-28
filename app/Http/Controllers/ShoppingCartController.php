<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function shoppingCart() {
        $shoppingCart = (\Auth::check()) ? \Auth::user()->shoppingCarts : [];
        
        return view('pages.shoppingCart.shoppingCart', [
            'shoppingCart' => $shoppingCart
        ]);
    }

    public function shoppingCartAdd(Request $request) {
        if ($request->ajax()) {
            $this->validate($request, [
                'activity_id' => 'required',
            ]);
            $activity = Activity::findOrFail($request->input('activity_id'));

            if(\Auth::check()) {
                $localStorage_sC = $request->input('shoppingCart');
                $bdd_sC          = ShoppingCart::where('user_id', \Auth::user()->id)->get();
                $localStorage_sC = ($localStorage_sC !== null) 
                                        ? json_decode($localStorage_sC) 
                                        : array();
                foreach ($localStorage_sC as $key => $localStr) {
                    foreach ($bdd_sC as $bddRow) {
                        if ($localStr->id ==  $bddRow->activity_id) {
                            $bddRow->quantity = $localStr->quantity + 1;
                            unset($localStorage_sC[$key]);
                        }
                    }
                }

                foreach ($localStorage_sC as $localStr) {
                    $shoppingCart = new ShoppingCart();
                    $shoppingCart->quantity    = $localStr->quantity;
                    $shoppingCart->activity_id = $localStr->id;
                    $shoppingCart->user_id     = \Auth::user()->id;

                    $shoppingCart->save();
                }

                $shoppingCart = new ShoppingCart();
                $shoppingCart->quantity    = 1;
                $shoppingCart->activity_id = $activity->id;
                $shoppingCart->user_id     = \Auth::user()->id;

                $shoppingCart->save();
                return 'OK';
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
