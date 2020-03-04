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

        $activities = Activity::where('state', 0)->paginate();
        $nombre_activities = Activity::where('state', 0)->get()->count();
        $companies  = Company::where('state', 0)->paginate();
        $nombre_companies = Company::where('state', 0)->get()->count();
        $comments   = Comment::where('state', 0)->paginate();
        $nombre_comments = Comment::where('state', 0)->get()->count();

        return view('pages.admin.moderation', [
            'activities' => $activities,
            'nombre_activities' => $nombre_activities,
            'companies' => $companies,
            'nombre_companies' => $nombre_companies,
            'comments' => $comments,
            'nombre_comments' => $nombre_comments
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
