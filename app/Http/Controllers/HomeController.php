<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compagny;

class HomeController extends Controller
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

    public function LM() {
        //TODO
    }

    public function TCU() {
        //TODO
    }

    public function TCS() {
        //TODO
    }
}
