<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Farmer;

class SenaraiController extends Controller
{
    public function index() {

        $farmers = Farmer::all();

        return view('lists.pesawah')->with('farmers', $farmers);
    }
}
