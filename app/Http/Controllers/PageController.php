<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compagny;

class PageController extends Controller
{
    public function test() {

        $compagnies = Compagny::get();
        return view('pages.test', [
            'compagnies' => $compagnies,
        ]);
    }
}
