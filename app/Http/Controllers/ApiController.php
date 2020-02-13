<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function mapUpdate($category_id, $subCategory_id, $what, $where) {
        /*if ($category_id != 'null' && $subCategory_id != 'null' && $what != 'null' && $where != 'null') {
            $companies = Company::where([['category_id','=', $category_id]['subCategory_id', '=', $subCategory_id]['']])
        }*/
        return Company::where('category_id', '=', $category_id)->get();
    }
}
