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
    public function moderation(Request $request) {

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
        $NowMonth = date('m');

        $nombre_companies_on_last_12_month  = [];
        $nombre_activities_on_last_12_month = [];
        $nombre_orders_on_last_12_month     = [];
        $mois_parcouru                      = [];

        $mois_en_francais = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aou', 'Sep', 'Oct', 'Nov', 'Déc'];


        for ($i=0; $i < 12; $i++) {
            $mois_parcouru[] = $mois_en_francais[intval($NowMonth)-1] . ' ' . $NowYear;

            $nombre_companies_on_last_12_month[]  = Company:: whereMonth('created_at', $NowMonth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();
            $nombre_activities_on_last_12_month[] = Activity::whereMonth('created_at', $NowMonth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();
            $nombre_orders_on_last_12_month[]= ActivityOrder::whereMonth('created_at', $NowMonth)
                                                            ->whereYear ('created_at', $NowYear)->get()->count();


            if($NowMonth == 1) {
                $NowMonth = 12;
                $NowYear--;
            }
            else {
                $NowMonth--;
            }
        }

        $administrators = User::where('admin', 1)->get();

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
            'nombre_companies_on_last_12_month'  => array_reverse($nombre_companies_on_last_12_month),
            'nombre_activities_on_last_12_month' => array_reverse($nombre_activities_on_last_12_month),
            'nombre_orders_on_last_12_month'     => array_reverse($nombre_orders_on_last_12_month),
            'mois_parcouru'                      => array_reverse($mois_parcouru),
            'administrators'                     => $administrators,
            'errorUser'                          => $request->input('errorUser')
        ]);
    }

    public function addAdmin(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            $user->admin = 1;
            $user->save();
            return redirect()->route('admin', ['#OK' => 1]);
        }
        else {
            return redirect()->route('admin', ['errorUser' => 1]);
        }
    }

    public function deleteAdmin(Request $request) {
        $user = User::where('email', $request->input('email'))->first();
        if ($user != null) {
            $user->admin = 0;
            $user->save();
            return redirect()->route('admin', ['#OK' => 1]);
        }
        else {
            return redirect()->route('profile', ['errorUser' => 1]);
        }
    }
}
