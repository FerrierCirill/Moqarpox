<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function shoppingCart() {
        session_start();
        
        if(\Auth::check()) {
            $shoppingCart      = [];
            $FuturShoppingCart = \Auth::user()->shoppingCarts;
            foreach ($FuturShoppingCart as $value) {
                $shoppingCart[] = Activity::findOrFail($value->activity_id);
            }
            
            if (isset($_SESSION['shoppingCart'])) {
                $shoppingCart = array_merge($shoppingCart, $_SESSION['shoppingCart']);

                foreach ($_SESSION['shoppingCart'] as $sessionStart) {
                    $shoppingCartAdd = new ShoppingCart();
                    $shoppingCartAdd->activity_id = $sessionStart->id;
                    $shoppingCartAdd->user_id     = \Auth::user()->id;
                    $shoppingCartAdd->save();
                }
            }
            unset($_SESSION['shoppingCart']);
        }
        else {
            $shoppingCart = isset($_SESSION['shoppingCart']) ? $_SESSION['shoppingCart'] : [];
        }
        
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
                // $localStorage_sC = $request->input('shoppingCart');
                    // $bdd_sC          = ShoppingCart::where('user_id', \Auth::user()->id)->get();
                    // $localStorage_sC = ($localStorage_sC !== null) 
                    //                         ? json_decode($localStorage_sC) 
                    //                         : array();
                    //
                    // foreach ($localStorage_sC as $key => $localStr) {
                    //     foreach ($bdd_sC as $bddRow) {
                    //         if ($localStr->id ==  $bddRow->activity_id) {
                    //             $bddRow->quantity = $localStr->quantity + 1;
                    //             unset($localStorage_sC[$key]);
                    //         }
                    //     }
                    // }
                    //
                    // foreach ($localStorage_sC as $localStr) {
                    //     $shoppingCart = new ShoppingCart();
                    //     $shoppingCart->quantity    = $localStr->quantity;
                    //     $shoppingCart->activity_id = $localStr->id;
                    //     $shoppingCart->user_id     = \Auth::user()->id;
                    //     $shoppingCart->save();
                // }

                $shoppingCart = new ShoppingCart();
                $shoppingCart->activity_id = $activity->id;
                $shoppingCart->user_id     = \Auth::user()->id;
                $shoppingCart->save();

                return 'OK';
            }
            else {
                session_start();
                if (!isset($_SESSION['shoppingCart'])) {
                    $_SESSION['shoppingCart'] = [];
                }

                $_SESSION['shoppingCart'][] = $activity;
                return 'OK';
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

    public function testSession(Request $request) {
        // phpinfo();
        session_start();
        dd($_SESSION);
        return '<br><br>O';
    }
}
