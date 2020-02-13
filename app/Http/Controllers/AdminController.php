<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function moderation() {
        return view('pages.admin.moderation');
    }
}
