<?php

namespace App\Http\Controllers;

use App\Activity;
use App\City;
use App\Company;
use App\SubCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function mapUpdate($category_id, $subCategory_id, $what, $where) {
        /*if ($category_id != 'null' && $subCategory_id != 'null' && $what != 'null' && $where != 'null') {
            $companies = Company::where([['category_id','=', $category_id]['subCategory_id', '=', $subCategory_id]['']])
        }*/
        return Company::where('category_id', '=', $category_id)->get();
    }

    public function datalist($value) {
        $activities = Activity::where('name', 'like', '%'.$value.'%')->get();
        $companies = Company::where('name', 'like', '%'.$value.'%')->get();
        $cities = City::where('name', 'like', '%'.$value.'%')->get();
        $subCategories = SubCategory::where('name', 'like', '%'.$value.'%')->get();

        return [
            'activities' => $activities,
            'companies' => $companies,
            'cities' => $cities,
            'subCategories' => $subCategories
        ];
    }
}
