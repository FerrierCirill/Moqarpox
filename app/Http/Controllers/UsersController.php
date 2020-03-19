<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Company;
use App\Notifications\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\ActivityOrder;
use App\Order;
use App\Mail\SendEmail;


class UsersController extends Controller
{
    public function getClient() {
        $user = \Auth::user();

        return view('pages.user.profile', [
            'user' => $user
        ]);
    }

    public function historical() {
        $orders = Order::where('user_id', \Auth::user()->id)->orderBy('id', 'desc')->get();

        // $orders = $orders->count() != 0 ? $orders : [] ;

        return view('pages.user.historical', [
            'orders' => $orders
        ]);
    }

    public function postUserEdit(Request $request) {
        $user = \Auth::user();

        if (Hash::check($request->input('password'), $user->password)) {

            $user->first_name  = $request->input('first_name');
            $user->second_name = $request->input('second_name');
            $user->phone       = $request->input('phone');
            $user->email       = $request->input('email');
            $user->civility    = $request->input('civility');

            $user->save();

            return redirect()->route('user_details');
        }
        return redirect()->back();
    }

    public function sendEmailToUser() {

        $to_email = "flo-ti@hotmail.fr";

        Mail::to($to_email)->send(new SendEmail);

        return "<p> Your E-mail has been sent successfully. </p>";

    }

    public function getCustomerCode() {
        return view('pages.company.get_customer_code');
    }

    public function postCustomerCode(Request $request) {
        $activity_order = ActivityOrder::where('code', $request->input('code'))->first();
        if($activity_order != null) {
            $activity = Activity::where('id', $activity_order->activity_id)->first();
            $company = Company::where('id', $activity->company_id)->first();
            $user = User::where('id', $company->user_id)->first();
            if (\Auth::id() == $user->id) {
                if ($activity_order->state == 0) {
                    $activity_order->state = 2;
                    $activity_order->save();

                    return view('pages.company.post_customer_code', [
                        'etat' => 1,
                    ]);
                } else {
                    return view('pages.company.post_customer_code', [
                        'etat' => 2,
                    ]);
                }
            } else {
                return view('pages.company.post_customer_code', [
                    'etat' => 0,
                ]);
            }
        }
    }

}
