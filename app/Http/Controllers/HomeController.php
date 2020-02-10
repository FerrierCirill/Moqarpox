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

    public function LM()
    {
        return view('pages.lm');
    }

    public function TCU()
    {
        return view('pages.tcu');
    }

    public function TCS()
    {
        return view('pages.tcs');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
