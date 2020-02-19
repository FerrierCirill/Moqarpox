<?php

namespace App\Http\Controllers;

use App\Company;
use App\Category;
use App\Activity;
use App\City;
use Illuminate\Http\Request;

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
            'name' => 'required',
            'phone' => 'required|number',
            'email' => 'required',
            'siret' => 'required',
            'rib' => 'required',
            'adress1' => 'required',
            'adress2' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'city_id' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required',
        ]);


        $compagny = new Company();
        $compagny->name        = $request->input('name');
        $compagny->phone       = $request->input('phone');
        $compagny->email       = $request->input('email');
        $compagny->siret       = $request->input('siret');
        $compagny->rib         = $request->input('rib');
        $compagny->adress1     = $request->input('adress1');
        $compagny->adress2     = $request->input('adress2');
        $compagny->city_id     = $request->input('city_id');
        $compagny->description = $request->input('description');
        $compagny->category_id = $request->input('category_id');
        $compagny->user_id     = $request->input('user_id');
        $compagny->lat         = $request->input('lat');
        $compagny->lng         = $request->input('lng');
        $compagny->save();

        //Voir pour le cas ou l'on envoie une image


        return redirect()->back();

    }

    public function getCompany($company_id) {
        $company = Company::where('state', 1)->where('id', $company_id)->first();
        if($company == null) return back();
        $activities_activer = Activity::where('company_id', $company->id)->where('state', '1')->paginate(12);
        $activities_forValideOrNotActi = Activity::where('company_id', $company->id)->where('state', '<>', '1')->get();

        return view('pages.company.company_details', [
            'company'                       => $company,
            'activities_activer'            => $activities_activer,
            'activities_forValideOrNotActi' => $activities_forValideOrNotActi
        ]);
    }

    public function getEditCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $cities = City::all();
        $categories = Category::all();


        return view('pages.user.company.edit', [
            'company' => $company,
            'cities' => $cities,
            'categories' => $categories
        ]);
    }


    public function postEditCompany($company_id) {
        //ToDo
    }

    public function getMoneyBack() {
        return view('pages.user.company.money_back', [
        ]);
    }

    public function postMoneyBack() {
        //Todo
    }
}
