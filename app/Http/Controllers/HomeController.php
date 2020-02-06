<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use App\Compagny;
use App\Activity;
use App\Picture;

class HomeController extends Controller
{
    public function test() {
        $compagnies = Compagny::get();
        return view('pages.test', [
            'compagnies' => $compagnies,
        ]);
    }

    public function index() {
        $picture = Picture::inRandomOrder()->first();
        $activity = Activity::findOrFail($picture->activity_id);

        $pictures = Picture::where('activity_id', $activity->id)->get();
        $categories = Category::get();
        $compagnies = Compagny::get();

        return view('pages.home', [
            'activity' => $activity,
            'pictures' => $pictures,
            'compagnies' => $compagnies,
            'categories' => $categories
        ]);

    }

    public function LM() {
        return view('pages.lm');
    }

    public function TCU() {
        return view('pages.tcu');
    }

    public function TCS() {
        return view('pages.tcs');
    }
}
