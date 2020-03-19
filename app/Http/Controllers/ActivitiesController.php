<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
use App\Company;
use App\Mail\ActivityRefuse;
use App\Mail\ActivityValide;
use App\Mail\CompanyValide;
use App\SubCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        $this->validate ($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'resume' => 'required',
            'information' => 'required',
            'subCategory_id' => 'required|exists:subCategories,id',
            'link0' => 'required|image',
        ]);

        if($request->hasFile('link0')) {
            $activity = new Activity();
            $activity->name = $request->input('name');
            $activity->price = $request->input('price');
            $activity->description = $request->input('description');
            $activity->resume = $request->input('resume');
            $activity->description_perso = $request->input('description_perso');
            $activity->information = $request->input('information');
            $activity->sub_category_id = $request->input('subCategory_id');
            $activity->company_id = $company_id;
            $activity->save();

            $path = $request->file('link0')->storeAs('public/images/upload/activities', 'activity_0_' . $activity->id . '.' . $request->file('link0')->extension());
            $path = str_replace('public', 'storage', $path);
            $activity->link0 = $path;
            $activity->save();

            if($request->hasFile('link1')){
                $path = $request->file('link1')->storeAs('public/images/upload/activities', 'activity_1_' . $activity->id . '.' . $request->file('link1')->extension());
                $path = str_replace('public', 'storage', $path);
                $activity->link1 = $path;
                $activity->save();
            }
            if($request->hasFile('link2')){
                $path = $request->file('link2')->storeAs('public/images/upload/activities', 'activity_2_' . $activity->id . '.' . $request->file('link2')->extension());
                $path = str_replace('public', 'storage', $path);
                $activity->link2 = $path;
                $activity->save();
            }

        return redirect()->route('company_details', ['company_id' => $company_id]);
        } else {
            return redirect()->back();
        }
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

        $company = Company::findOrFail($activity->company_id);
        $user = User::findOrFail($company->user_id);
        $to_email = $user->email;
        Mail::to($to_email)->send(new ActivityValide($activity_id));
        return redirect()->back();
    }

    public function refuseActivity($activity_id) {
        $activity = Activity::findOrFail($activity_id);
        $activity->state = 2;
        $activity->save();

        $company = Company::findOrFail($activity->company_id);
        $user = User::findOrFail($company->user_id);
        $to_email = $user->email;

        Mail::to($to_email)->send(new ActivityRefuse($activity->name));
    }

    public function changeState($activity_id, $state) {
        $activity = Activity::findOrFail($activity_id);
        $activity->state = $state;
        $activity->save();

        return redirect()->back();
    }
}
