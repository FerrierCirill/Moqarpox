<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Company;
use App\Activity;
use App\Picture;

class HomeController extends Controller
{
    public function test()
    {
        $companies = Company::get();
        return view('pages.test', [
            'companies' => $companies,
        ]);
    }

    public function index()
    {
        $picture = Picture::inRandomOrder()->first();
        $activity = Activity::findOrFail($picture->activity_id);

        $pictures = Picture::where('activity_id', $activity->id)->get();
        $categories = Category::get();
        $companies = Company::get();

        return view('pages.home', [
            'activity' => $activity,
            'pictures' => $pictures,
            'companies' => $companies,
            'categories' => $categories
        ]);
    }

    public function shoppingCart() {
        return view('pages.shoppingCart.shoppingCart');
    }

    public function payment() {
        return view('pages.shoppingCart.payment');
    }

    public function LM()
    {
        return view('pages.right.lm');
    }

    public function TCU()
    {
        return view('pages.right.tcu');
    }

    public function TCS()
    {
        return view('pages.right.tcs');
    }


    /*FORCE CONTROLLER TO USE MIDDLEWARE AUTH BEFORE INITIALIZE
    public function __construct()
    {
        $this->middleware('auth');
    }
    */

}
