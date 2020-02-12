<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\AcceptHeaderItem;

class ActivitiesController extends Controller
{
    public function getActivities(){
        $activities = Activity::get();

        return view('pages.activities', [
            'activities' => $activities
        ]);
    }

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
        $activity->description = $request->input('description');
        $activity->resume = $request->input('resume');
        $activity->information = $request->input('information');
        $activity->state = 'A vérifier';
        $activity->note = 2.5;
        $activity->subCategory_id = $request->input('subCategory_id');
        $activity->company_id = $request->input('company_id');
        $activity->save();

        return redirect()->back();
    }

    public function getActivity($activity_id){
        $activity = Activity::findOrFail($activity_id);

        return view('pages.activity_details', [
            'activity' => $activity
        ]);
    }
}
