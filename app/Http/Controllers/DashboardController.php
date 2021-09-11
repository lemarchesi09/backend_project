<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $title ["title"] = "prueba";
        return view("home.home",$title);
    }
    
}


