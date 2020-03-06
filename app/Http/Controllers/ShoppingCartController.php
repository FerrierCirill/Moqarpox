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
                return 'OK SESSION';
            }
        }
        abort(402);
    }

    public function shoppingCartDelete(Request $request) {
        if(\Auth::check()) {
            var_dump($request->input());die;
            ShoppingCart::where('activity_id', $activity_id)->delete();
            return redirect()->back();
        } else {

        }
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
