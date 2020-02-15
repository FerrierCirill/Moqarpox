<?php

namespace App\Http\Controllers;

use App\Company;
use App\Activity;
use App\City;
use App\Picture;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function getAddCompany() {
        $cities = City::get();

        return view('pages.user.company.add', [
            'cities' => $cities
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
        $compagny->name = $request->input('name');
        $compagny->phone = $request->input('phone');
        $compagny->email = $request->input('email');
        $compagny->siret = $request->input('siret');
        $compagny->rib = $request->input('rib');
        $compagny->adress1 = $request->input('adress1');
        $compagny->adress2 = $request->input('adress2');
        $compagny->city_id = $request->input('city_id');
        $compagny->description = $request->input('description');
        $compagny->category_id = $request->input('category_id');
        $compagny->user_id = $request->input('user_id');
        $compagny->lat = $request->input('lat');
        $compagny->lng = $request->input('lng');
        $compagny->save();

        //Voir pour le cas ou l'on envoie une image


        return redirect()->back();

    }

    public function getCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $activities = Activity::where('company_id', $company->id)->paginate(12);


        return view('pages.company.company_details', [
            'company' => $company,
            'activities' => $activities
        ]);
    }

    public function editCompany($company_id) {
        $company = Company::findOrFail($company_id);

        return view('pages.user.company.edit', [
            'company' => $company
        ]);
    }


    public function getMoneyBack() {
        return view('pages.user.company.money_back', [
        ]);
    }

    public function postMoneyBack() {
        //Todo
    }
}
