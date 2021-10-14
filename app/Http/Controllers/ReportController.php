<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Farmer;
use App\Models\Season;

class ReportController extends Controller
{
    public function bancian() {

        return view('reports.bancian');
    }

    public function carianBancian(Request $request) {

        // dd($request->all());

        $farmers = Farmer::where('nama', 'LIKE', '%' . $request['namaPesawah'] . '%')->get();

        return view('reports.hasilBancian')->with('farmers', $farmers);
    }

    public function maklumatBancian(Request $request, $id) {

        $farmer = Farmer::find($id)->first();

        $season = Season::where('farmer_id', $id)->get()->last();

        if($season == null) {
            
            Session::flash('fail', 'Maklumat bancian ' . $farmer->nama . ', tiada dalam rekod');
            return redirect()->route('bancian');
        }

        return view('reports.maklumatBancian')->with('season', $season);
    }
}
