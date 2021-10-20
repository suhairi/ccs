<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Farmer;
use App\Models\Season;
use App\Models\Crop;
use App\Models\Variety;
use App\Models\Fertilization;
use App\Models\Issue;
use App\Models\Hasil;
use App\Models\Musim;
use App\Models\Locality;

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

        $farmer             = Farmer::find($id)->first();
        $season             = Season::where('farmer_id', $id)->get()->last();
        $crop               = Crop::where('season_id', $season->id)->get()->last();
        $fertilizations     = Fertilization::where('season_id', $season->id)->get();
        $issues             = Issue::where('season_id', $season->id)->get();
        $hasil              = Hasil::where('season_id', $season->id)->get();

        // dd($crop->variety->nama);


        if($season == null) {
            
            Session::flash('fail', 'Maklumat bancian ' . $farmer->nama . ', Tiada dalam rekod.');
            return redirect()->route('bancian');
        }

        // dd($crop->variety()->nama);

        return view('reports.maklumatBancian')
                ->with('season', $season)
                ->with('crop', $crop)
                ->with('fertilizations', $fertilizations)
                ->with('issues', $issues)
                ->with('hasil', $hasil);
    }

    public function variety() {

        $musim      = Musim::where('status', 1)->first();

        $variety    = Variety::all();
        $locality   = Locality::all();

        $season     = Season::where('musim_id', $musim->id)->get()->first();
        $seasons    = Season::where('musim_id', $musim->id)->get();

        $crops      = Crop::where('season_id', $season->id)->get();

        dd($crops);

        return view('reports.varieti')
                ->with('variety', $variety);

    }
}
