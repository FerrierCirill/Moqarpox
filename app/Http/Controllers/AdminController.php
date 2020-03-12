<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use App\Company;
use App\User;
use App\ActivityOrder;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function moderation() {

        $activities = Activity::where('state', 0)->paginate(5);
        $companies  = Company::where('state', 0)->paginate(5);
        $comments   = Comment::where('state', 0)->paginate(5);

        $numberOfCompanies  = Company::get()->count();
        $numberOfActivities = Activity::get()->count();

        $numberOfCompaniesValidate  = Company::where('state', 1)->get()->count();
        $numberOfActivitiesValidate = Activity::where('state', 1)->get()->count();

        $nombre_activities_attente = Activity::where('state', 0)->get()->count();
        $nombre_companies_attente  = Company::where('state', 0)->get()->count();
        $nombre_comments_attente   = Comment::where('state', 0)->get()->count();

        $orders = ActivityOrder::get()->count();

        $NowYear = date('Y');
        $NowMouth = date('m');

        $nombre_companies_on_last_12_mouth  = [];
        $nombre_activities_on_last_12_mouth = [];
        $nombre_orders_on_last_12_mouth     = [];

        for ($i=0; $i < 12; $i++) { 
            $nombre_companies_on_last_12_mouth[]  = Company:: whereMonth('created_at', $NowMouth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();
            $nombre_activities_on_last_12_mouth[] = Activity::whereMonth('created_at', $NowMouth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();
            $nombre_orders_on_last_12_mouth[]= ActivityOrder::whereMonth('created_at', $NowMouth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();


            if($NowMouth == 1) {
                $NowMouth = 12;
                $NowYear--;
            }
            else {
                $NowMouth--;
            }
        }

        return view('pages.admin.moderation', [
            'activities'                         => $activities,
            'nombre_activities_attente'          => $nombre_activities_attente,
            'companies'                          => $companies,
            'nombre_companies_attente'           => $nombre_companies_attente,
            'comments'                           => $comments,
            'orders'                             => $orders,
            'nombre_comments_attente'            => $nombre_comments_attente,
            'nombre_companies'                   => $numberOfCompanies,
            'nombre_activities'                  => $numberOfActivities,
            'nombre_companies_valide'            => $numberOfCompaniesValidate,
            'nombre_activities_valide'           => $numberOfActivitiesValidate,
            'nombre_companies_on_last_12_mouth'  => $nombre_companies_on_last_12_mouth,
            'nombre_activities_on_last_12_mouth' => $nombre_activities_on_last_12_mouth,
            'nombre_orders_on_last_12_mouth'     => $nombre_orders_on_last_12_mouth
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
