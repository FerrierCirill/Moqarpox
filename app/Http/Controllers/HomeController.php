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
        $activity = Activity::where('state',1)->inRandomOrder()->first();
        $categories = Category::get();
        $companies = Company::get();

        $companiesMap = \DB::select('SELECT * from companies WHERE state = 1 AND id IN (SELECT company_id FROM activities)');

        $categories = Category::where('id', '<>', 5)->get();
        $subCategories = SubCategory::get();
        $maxPrice = Activity::orderBy('price', 'desc')->first();
        $minPrice = Activity::orderBy('price', 'asc')->first();

        return view('pages.home', [
            'activity' => $activity,
            'companies' => $companies,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'companiesMap' => $companiesMap,
            'categories' => $categories,
            'subCategories' => $subCategories
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

    public function faq() {
        return view('pages.right.faq');
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

        if($code_exists != null) {
            $activityOrderId = $code_exists->id;
            $activityId      = $code_exists->activity_id;
            $code_used       = Comment::where('activity_order_id', $code_exists->id)->first();
            if ($code_used == null) {

                $comment                    = new Comment();
                $comment->title             = $request->input('title');
                $comment->message           = $request->input('message');
                $comment->note              = $request->input('note');
                $comment->activity_order_id = $activityOrderId;
                $comment->activity_id       = $activityId;
                $comment->state = 0;

                $comment->save();

                return redirect()->back();
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function changeStateComment($comment_id, $state) {
        $comment = Comment::findOrFail($comment_id);
        $comment->state = $state;
        $comment->save();

        return redirect()->back();
    }

    /*FORCE CONTROLLER TO USE MIDDLEWARE AUTH BEFORE INITIALIZE
    public function __construct()
    {
        $this->middleware('auth');
    }
    */
}
