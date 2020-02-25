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
                $category = Category::where('name', '=', $value)->first();
                $category_id = $category->id;
                $companies = Company::where('category_id', '=', $category_id)->get();
                break;
            case 'Sous-catégories' :
                $subCategory = SubCategory::where('name', '=', $value)->first();
                $subCategory_id = $subCategory->id;
                $idOfCompaniesFromActivities = Activity::select('company_id')->where('subCategory_id', '=', $subCategory_id)->get();
                $ids = array();
                foreach ($idOfCompaniesFromActivities as $id) {
                    array_push($ids, $id->company_id);
                }
                $companies_id  = array_unique($ids);
                $companies = array();
                foreach ($companies_id as $id) {
                    $company = Company::find($id);
                    array_push($companies, $company);
                }
                break;
            case 'Activités' :
                $idOfCompaniesFromActivities = Activity::select('company_id')->where('name', '=', $value)->get();
                $ids = array();
                foreach ($idOfCompaniesFromActivities as $id) {
                    array_push($ids, $id->company_id);
                }
                $companies_id  = array_unique($ids);
                $companies = array();
                foreach ($companies_id as $id) {
                    $company = Company::find($id);
                    array_push($companies, $company);
                }
                break;
        }
        return $companies;
    }

    public function returnLatLng($address) {
        $data = array(
            'q'      => $address,
            'format' => 'json',
        );
        $url = 'https://nominatim.openstreetmap.org/?' . http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36'); //https://deviceatlas.com/lp/user-agent
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $geopos = curl_exec($ch);
        curl_close($ch);
        $json_data = json_decode($geopos, true);

        $result = [];
        $lat = $json_data[0]['lat'];
        $lon = $json_data[0]['lon'];
        array_push($result, $lat);
        array_push($result, $lon);
        return $result;
    }
}
