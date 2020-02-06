<?php

namespace App\Http\Controllers;

use App\Compagny;
use App\City;
use Illuminate\Http\Request;

class CompagniesController extends Controller
{
    public function getCompagnies() {
        $compagnies = Compagny::get();

        return view('pages.compagnies', [
            'compagnies' => $compagnies
        ]);
    }

    public function getAddCompagny() {
        $cities = City::get();

        return view('pages.compagny_add', [
            'cities' => $cities
        ]);
    }

    public function postAddCompagny() {
        //TODO
    }

    public function getCompagny($compagny_id) {
        $compagny = Compagny::findOrFail($compagny_id);

        return view('pages.compagny_details', [
            'compagny' => $compagny
        ]);
    }

    public function editCompagny() {
        //TODO
    }
}
