<?php

namespace App\Http\Controllers;

use App\Plan;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        return view('plans.index', ['plans' => $plans]);
    }
}
