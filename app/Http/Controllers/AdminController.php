<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use App\Company;

class AdminController extends Controller
{
    public function moderation() {

        $activities = Activity::where('state', 0)->paginate(10);
        $companies  = Company::where('state', 0)->paginate(10);
        $comments   = Comment::where('state', 0)->paginate(10);

        return view('pages.admin.moderation', [
            'activities' => $activities,
            'companies' => $companies,
            'comments' => $comments
        ]);
    }
}
