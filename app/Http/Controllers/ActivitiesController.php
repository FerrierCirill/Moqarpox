<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function getAddActivity(){
        $categories = Category::get();
        $subCategories = SubCategory::get();

        return view('pages.user.company.activity.add', [
            'categories' => $categories,
            'subCategories' => $subCategories
        ]);
    }

    public function postAddActivity(Request $request){

        $this->validate ($request, [
            'name' => 'required',
            'price' => 'required|number',
            'description' => 'required',
            'resume' => 'required',
            'information' => 'required',
            'subCategory_id' => 'required|exists:subCategories,id',
            'company_id' => 'required|exists:companies,id'
        ]);

        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->price = $request->input('price');
        $activity->resume = $request->input('resume');
        $activity->description = $request->input('description');
        $activity->description_perso = $request->input('description_perso');
        $activity->information = $request->input('information');
        $activity->subCategory_id = $request->input('subCategory_id');
        $activity->company_id = $request->input('company_id');
        $activity->save();

        //Voir pour le cas d'envoie d'images

        return redirect()->back();
    }

    public function getActivity($activity_id){
        if (\Auth::check() && \Auth::user()->admin != \App\User::ADMIN)
            $activity = Activity::where('state', 1)->where('id',$activity_id)->first();
        else
            $activity = Activity::where('id',$activity_id)->first();
        if($activity == null) return back();

        return view('pages.company.activity.activity_details', [
            'activity' => $activity
        ]);
    }

    public function changeState(Request $request) {
        //TODO
    }
}
