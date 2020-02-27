<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function getClient() {
        $user = \Auth::user();

        return view('pages.user.profile', [
            'user' => $user
        ]);
    }

    public function historical() {

        return view('pages.user.historical');
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
}
