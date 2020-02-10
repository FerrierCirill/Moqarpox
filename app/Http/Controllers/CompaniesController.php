<?php

namespace App\Http\Controllers;

use App\Company;
use App\City;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function getCompanies() {
        $companies = Company::get();

        return view('pages.companies', [
            'companies' => $companies
        ]);
    }

    public function getAddCompany() {
        $cities = City::get();

        return view('pages.company_add', [
            'cities' => $cities
        ]);
    }

    public function postAddCompany() {
        //TODO
    }

    public function getCompany($company_id) {
        $company = Company::findOrFail($company_id);

        return view('pages.company_details', [
            'company' => $company
        ]);
    }

    public function editCompany() {
        //TODO
    }
}
