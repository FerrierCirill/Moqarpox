<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanierVenteController extends Controller
{
    public function panier() {
        return view('pages.panier.panier');
    }
}
