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

        $numberOfCompanies = Company::get()->count();
        $numberOfActivities = Activity::get()->count();

        $numberOfCompaniesValidate = Company::where('state', 1)->get()->count();
        $numberOfActivitiesValidate = Activity::where('state', 1)->get()->count();

        $nombre_activities_attente = Activity::where('state', 0)->get()->count();
        $nombre_companies_attente = Company::where('state', 0)->get()->count();
        $nombre_comments_attente = Comment::where('state', 0)->get()->count();

        return view('pages.admin.moderation', [
            'activities' => $activities,
            'nombre_activities_attente' => $nombre_activities_attente,
            'companies' => $companies,
            'nombre_companies_attente' => $nombre_companies_attente,
            'comments' => $comments,
            'nombre_comments_attente' => $nombre_comments_attente,
            'nombre_companies' => $numberOfCompanies,
            'nombre_activities' => $numberOfActivities,
            'nombre_companies_valide' => $numberOfCompaniesValidate,
            'nombre_activities_valide' => $numberOfActivitiesValidate
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
