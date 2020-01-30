<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compagny;

class Home extends Controller
{
    public function test() {

        $compagnies = Compagny::get();
        return view('pages.test', [
            'compagnies' => $compagnies,
        ]);
    }

    public function design() {

        $compagnies = Compagny::get();
        return view('pages.home', [
            'compagnies' => $compagnies,
        ]);
    }
}
