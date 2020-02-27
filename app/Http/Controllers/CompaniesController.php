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
            'phone' => 'required|numeric',
            'email' => 'required',
            'siret' => 'required',
            'rib' => 'required',
            'adress1' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'link' => 'required|image',
            'city_id' => 'required|exists:cities,id',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images/upload/companies'), $imageName);

        var_dump(public_path('images/upload/companies') . $imageName);
        die;

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
        $compagny->link        = public_path('images/upload/companies') . $imageName;
        $compagny->lat         = $request->input('lat');
        $compagny->lng         = $request->input('lng');
        $compagny->save();

        return redirect()->back();

    }

    public function getCompany($company_id) {
        if (\Auth::check() && \Auth::user()->admin != \App\User::ADMIN)
            $company = Company::where('state', 1)->where('id', $company_id)->first();
        else
            $company = Company::where('id', $company_id)->first();

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

    public function confirmCompany($company_id) {
        $company = Company::findOrFail($company_id);
        $company->state = 1;
        $company->save();

        return redirect()->back();
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
