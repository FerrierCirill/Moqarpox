<?php

namespace App\Http\Controllers;

use App\Company;
use App\City;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function getAddCompany() {
        $cities = City::get();

        return view('pages.user.company.add', [
            'cities' => $cities
        ]);
    }

    public function postAddCompany() {
        //TODO
    }

    public function getCompany($company_id) {
        $company = Company::findOrFail($company_id);

        return view('pages.company.company_details', [
            'company' => $company
        ]);
    }

    public function editCompany($company_id) {
        $company = Company::findOrFail($company_id);

        return view('pages.user.company.edit', [
            'company' => $company
        ]);
    }
}
