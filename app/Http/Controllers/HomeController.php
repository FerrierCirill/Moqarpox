<?php

namespace App\Http\Controllers;

use App\ActivityOrder;
use App\Category;
use App\Comment;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Company;
use App\Activity;

class HomeController extends Controller
{
    public function map()
    {
        $companies = Company::where('state', 1)->get();
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $maxPrice = Activity::orderBy('price', 'desc')->first();
        $minPrice = Activity::orderBy('price', 'asc')->first();
        return view('pages.map', [
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
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

    public function LM() {
        return view('pages.right.lm');
    }

    public function TCU() {
        return view('pages.right.tcu');
    }

    public function TCS() {
        return view('pages.right.tcs');
    }

    public function getAddComment() {
        return view('pages.company.activity.add_comment');
    }

    public function postAddComment(Request $request) {
        $this->validate($request, [
            'code' => 'required',
            'title' => 'required',
            'message' => 'required',
            'note' => 'required'
        ]);

        $code_exists = ActivityOrder::where('code', $request->input('code'))->first();
        var_dump($code_exists);
        if($code_exists != null) {
            $code_used = Comment::where('activity_order_id', $code_exists->id)->first();
            var_dump($code_used);
        }
        return redirect()->route('home');
    }

    public function getRepayment() {
        return view('pages/repayment');
        //TODO
    }

    public function postRepayment(Request $request) {
        //TODO
    }

    /*FORCE CONTROLLER TO USE MIDDLEWARE AUTH BEFORE INITIALIZE
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
}
