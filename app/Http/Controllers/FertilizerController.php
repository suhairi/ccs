<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FertilizerController extends Controller
{
    public function index() {

        return view('forms.fertilizer');
    }
}
