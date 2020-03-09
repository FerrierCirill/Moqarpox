<?php

namespace App\Http\Controllers;

use App\ActivityOrder;
use App\Code404Generator;
use App\Order;
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
                    $shoppingCartAdd->email       = \Auth::user()->email;
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
                $shoppingCart = new ShoppingCart();
                $shoppingCart->email    = \Auth::user()->email;
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

    public function shoppingCartDelete($activity_id) {
        if(\Auth::check()) {
            $item = ShoppingCart::where('activity_id', $activity_id)->first();
            ShoppingCart::where('id', $item->id)->delete();

            return redirect()->back();
        } else {
            session_start();

            $panier = $_SESSION['shoppingCart'];
            for($i = 0; $i < sizeof($panier); $i++) {
                if($panier[$i]['id'] == $request->input('id')) {
                    unset($panier[$i]);
                    break;
                }
            }
            $_SESSION['shoppingCart'] = [];
            foreach ($panier as $item) {
                array_push($_SESSION['shoppingCart'], $item);
            }
            return redirect()->back();
        }
    }

    public function shoppingCartValidate(Request $request) {
        $shoppingCarts  = \Auth::user()->shoppingCarts;

        if($request->method() == "POST") {
            $friend_names  = $request->input('friend_name');
            $friend_emails = $request->input('friend_name');
            $texts         = $request->input('text');

            foreach($friend_names as $key => $friend_name) {
                if ($friend_name         != null &&
                    $friend_emails[$key] != null &&
                    $texts[$key]         != null
                ) {
                    $shoppingCarts[$key]->friend_name  = $friend_name;
                    $shoppingCarts[$key]->friend_email = $friend_emails[$key];
                    $shoppingCarts[$key]->text         = $texts[$key];
                    $shoppingCarts[$key]->save();
                }
            }
        }

        foreach ($shoppingCarts as $shoppingCart) {
            $shoppingCart->email = \Auth::user()->email;
            $shoppingCart->save();
        }

        return view('pages.shoppingCart.validate', [
            'shoppingCarts' => $shoppingCarts
        ]);
    }

    public function payment() {
        $user = \Auth::user();
        $shopping_carts = ShoppingCart::where('user_id', $user->id)->get();
        if($shopping_carts != []) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->save();
            foreach ($shopping_carts as $shopping_cart) {

                $activity_order = new ActivityOrder();
                $activity_order->code = Code404Generator::generate();
                $activity_order->text = $shopping_cart->text;
                $activity_order->email = $shopping_cart->email;
                $activity_order->friend_name = $shopping_cart->friend_name;
                $activity_order->friend_email = $shopping_cart->friend_email;
                $activity_order->order_id = $order->id;
                $activity_order->activity_id = $shopping_cart->activity_id;
                $activity_order->save();

                ShoppingCart::where('id', $shopping_cart->id)->delete();
            }
        }
    }

    public function thanks() {
        return view('pages.shoppingCart.thanks');
    }

//     public function testSession(Request $request) {
//         // phpinfo();
//         session_start();
//         dd($_SESSION);
//         return '<br><br>O';
//     }
}
