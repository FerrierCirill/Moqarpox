<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
