<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use App\Company;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function moderation() {

        $activities = Activity::where('state', 0)->paginate(5);
        $companies  = Company::where('state', 0)->paginate(5);
        $comments   = Comment::where('state', 0)->paginate(5);

        return view('pages.admin.moderation', [
            'activities' => $activities,
            'companies' => $companies,
            'comments' => $comments
        ]);
    }

    public function addAdmin(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            $user->admin = 1;
            $user->save();
        }
        return redirect()->back();
    }

    public function deleteAdmin(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            $user->admin = 0;
            $user->save();
        }
        return redirect()->back();
    }
}
