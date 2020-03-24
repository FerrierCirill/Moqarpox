<?php

namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\Activity;
use App\City;
use App\Mail\CompanyRefuse;
use App\Mail\CompanyValide;
use App\Mail\SendEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompaniesController extends Controller
{
    public function getAddCompany() {
        $cities = City::all();
        $categories = Category::all();

        return view('pages.user.company.add', [
            'cities' => $cities,
            'categories' => $categories
        ]);
    }

    public function postAddCompany(Request $request) {

        $this->validate ($request, [
            'name'        => 'required',
            'phone'       => 'required|numeric',
            'email'       => 'required',
            'siret'       => 'required',
            'rib'         => 'required',
            'adress1'     => 'required',
            'lat'         => 'required',
            'lng'         => 'required',
            'link'        => 'required|image',
            'city_id'     => 'required|exists:cities,id',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        if($request->hasFile('link')) {

            $company = new Company();
            $company->name        = $request->input('name');
            $company->phone       = $request->input('phone');
            $company->email       = $request->input('email');
            $company->siret       = $request->input('siret');
            $company->rib         = $request->input('rib');
            $company->adress1     = $request->input('adress1');
            $company->adress2     = $request->input('adress2');
            $company->city_id     = $request->input('city_id');
            $company->description = $request->input('description');
            $company->category_id = $request->input('category_id');
            $company->user_id     = Auth::id();
            $company->lat         = $request->input('lat');
            $company->lng         = $request->input('lng');
            $company->save();

            $path = $request->file('link')->storeAs('public/images/upload/companies', 'company_' . $company->id . '.' . $request->file('link')->extension());
            $path = str_replace('public', 'storage', $path);
            $company->link = $path;
            $company->save();

            $user = User::findOrFail(Auth::id());
            $user->state = 1;
            $user->save();

            return redirect()->route('user_details');
        } else {
            return redirect()->back();
        }
    }

    public function getCompany($company_id) {
        $company = Company::where('id', $company_id)->first();

        /**
         * Si
         * - l'entreprise n'existe pas
         * ou
         * - l'entreprise n'est pas encore validée
         *  et
         * - l'utilisateur est connecté  + ( utilisateur = (admin  [ou  propriétaire]* ) )
         *  *à voir
         */

        if($company == null  || $company->state != 1 && ( !\Auth::check() && \Auth::user()->admin != \App\User::ADMIN )) {
            //|| \Auth::id()!=$company->user_id) )
            return back();
        }

        $activities_activer            = Activity::where('company_id', $company->id)->where('state', '1')->paginate(12);
        $activities_forValideOrNotActi = Activity::where('company_id', $company->id)->where('state', '<>', '1')->get();

        // dd($company->state);

        return view('pages.company.company_details', [
            'company'                       => $company,
            'activities_activer'            => $activities_activer,
            'activities_forValideOrNotActi' => $activities_forValideOrNotActi,
        ]);
    }

    public function getEditCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $cities = City::all();
        $categories = Category::all();


        return view('pages.user.company.edit', [
            'company'    => $company,
            'cities'     => $cities,
            'categories' => $categories
        ]);
    }

    public function postEditCompany(Request $request, $company_id) {
        $company = Company::findOrFail($company_id);

        if($request->hasFile('link')) {
            $company->name        = $request->input('name');
            $company->phone       = $request->input('phone');
            $company->email       = $request->input('email');
            $company->siret       = $request->input('siret');
            $company->rib         = $request->input('rib');
            $company->adress1     = $request->input('adress1');
            $company->adress2     = $request->input('adress2');
            $company->city_id     = $request->input('city_id');
            $company->description = $request->input('description');
            $company->category_id = $request->input('category_id');
            $company->lat         = $request->input('lat');
            $company->lng         = $request->input('lng');

            $path = $request->file('link')->storeAs('public/images/upload/companies', 'company_' . $company->id . '.' . $request->file('link')->extension());
            $path = str_replace('public', 'storage', $path);
            $company->link = $path;
            $company->save();
        }
        return redirect()->route('company_details', ['company_id' => $company_id]);
    }

    public function confirmCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $company->state = 1;
        $company->save();
        $user = User::findOrFail($company->user_id);
        $to_email = $user->email;
        Mail::to($to_email)->send(new CompanyValide($company_id));
        return redirect()->back();
    }

    public function refuseCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $company->state = 2;
        $company->save();
        $user = User::findOrFail($company->user_id);
        $to_email = $user->email;

        Mail::to($to_email)->send(new CompanyRefuse($company->name));
        return redirect()->back();
    }
}
