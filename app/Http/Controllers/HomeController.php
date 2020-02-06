<?php

namespace App\Http\Controllers;

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

    public function design() {
        // do {
        //     $activity = Activity::where('state', 'activer')
        //                       ->where('note', '>', 4.5)
        //                       ->get()->random();
        //     $pictures = Picture::where('activity_id', $activity->id)->get();
        // } while ($pictures->count() == 0);

        $activity   = Activity::find(4937);
        $pictures   = Picture::where('activity_id', $activity->id)->get();
        $compagnies = Compagny::get();

        return view('pages.home', [
            'compagnies' => $compagnies,
            'activity'   => $activity,
            'pictures'   => $pictures
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
