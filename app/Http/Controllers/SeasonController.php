<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Farmer;

class SeasonController extends Controller
{
    public function index() {

        $pesawah = Farmer::all();

        dd($pesawah);

        return view('forms.carianPesawah', $pesawah);
    }
}
