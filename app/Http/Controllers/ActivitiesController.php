<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivitiesController extends Controller
{
    public function getAddActivity($company_id){
        $categories = Category::get();
        $subCategories = SubCategory::get();

        return view('pages.user.company.activity.add', [
            'categories' => $categories,
            'subCategories' => $subCategories,
            'company_id' => $company_id
        ]);
    }

    public function postAddActivity(Request $request, $company_id){
       // echo 'company:'.$company_id.'<br>';
      //  var_dump($request->request);

        $this->validate ($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'resume' => 'required',
            'information' => 'required',
            'subCategory_id' => 'required|exists:subCategories,id',
            'link0' => 'required|image',
        ]);

        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->price = $request->input('price');
        $activity->description = $request->input('description');
        $activity->resume = $request->input('resume');
        $activity->description_perso = $request->input('description_perso');
        $activity->information = $request->input('information');
        $activity->subCategory_id = $request->input('subCategory_id');
        $activity->company_id = $company_id;
        $activity->save();

        //Voir pour le cas d'envoie d'images
        //var_dump('test');
        return  redirect()->route('user_details');
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

    public function confirmActivity($activity_id) {
        $activity = Activity::findOrFail($activity_id);
        $activity->state = 1;
        $activity->save();

        return redirect()->back();
    }

    public function refuseActivity($activity_id) {
        $activity = Activity::findOrFail($activity_id);
        $activity->state = 2;
        $activity->save();

        return redirect()->back();
    }

    public function changeState($activity_id, $state) {
        $activity = Activity::findOrFail($activity_id);
        $activity->state = $state;
        $activity->save();

        return redirect()->back();
    }
}
