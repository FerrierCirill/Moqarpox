<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Category;
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
        $activities = Activity::where('name', 'like', '%'.$value.'%')->skip(0)->take(5)->orderBy('name', 'asc')->get();
        $cities = City::where('name', 'like', '%'.$value.'%')->skip(0)->take(3)->orderBy('name', 'asc')->get();
        $categories = Category::where('name', 'like', '%'.$value.'%')->orderBy('name', 'asc')->get();
        $subCategories = SubCategory::where('name', 'like', '%'.$value.'%')->skip(0)->take(3)->orderBy('name', 'asc')->get();

        return [
            'activities' => $activities,
            'categories' => $categories,
            'cities' => $cities,
            'subCategories' => $subCategories
        ];
    }

    public function getActivitiesOfCompany($company_id) {
        $activities = Activity::where('company_id', '=', $company_id)->get();
        return $activities;
    }

    public function mainSearch($type, $value) {
        $companies = [];

        switch ($type) {
            case 'Villes':
                $city = City::where('name', '=', $value)->first();
                $city_id = $city->id;
                $companies = Company::where('city_id', '=', $city_id)->get();
                break;
            case 'Catégories' :
                $category = Category::where('name', '=', $value)->get(); //A CORRIGER
                $category_id = $category->id;
                $companies = Company::where('category_id', '=', $category_id)->get();
                break;
            case 'Sous-catégories' :
                //TODO
                break;
            case 'Activités' :
                //todo
                break;
        }
        var_dump($companies);
        die;
        return $companies;
    }
}
