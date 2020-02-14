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
    public function map()
    {
        $companies = Company::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('pages.map', [
            'companies' => $companies,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    public function test()
    {
        $companies = Company::get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        return view('pages.test', [
            'companies' => $companies,
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    public function index()
    {
        $activity = Activity::inRandomOrder()->first();
        $categories = Category::get();
        $companies = Company::get();

        return view('pages.home', [
            'activity' => $activity,
            'companies' => $companies,
            'categories' => $categories
        ]);
    }

    public function shoppingCart() {
        return view('pages.shoppingCart.shoppingCart');
    }

    public function payment() {
        $user = \Auth::user();

        return view('pages.shoppingCart.payment', [
            'user' => $user
        ]);
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
