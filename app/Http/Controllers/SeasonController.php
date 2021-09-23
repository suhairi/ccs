<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Farmer;
use App\Models\Region;
use App\Models\Locality;
use App\Models\Season;
use App\Models\Variety;
use App\Models\Method;


class SeasonController extends Controller
{
    public function index() {

        $pesawah = Farmer::all();

        return view('forms.carianPesawah');
    }

    public function carian(Request $request) {

        $farmers = Farmer::where('nama', 'LIKE', '%' . $request['namaPesawah'] . '%')->get();

        // dd($farmers);

        return view('forms.hasilCarian')->with('farmers', $farmers);
    }

    public function musim(Request $request, $id) {

        Session::put('pesawah_id', $id);

        $farmers = Farmer::all();
        $farmer = $farmers->find($id);

        $regions = Region::all();

        $localities = Locality::all();

        return view('forms.musim')
                ->with('farmer', $farmer)
                ->with('regions', $regions)
                ->with('localities', $localities);
    }

    public function store(Request $request) {

        // dd($request->pesawah_id);

        $attributes = $request->validate([
                        'nama'          => 'required',
                        'musim'         => 'required|numeric',
                        'fasa'          => 'required|numeric',
                        'locality_id'   => 'required|numeric',
                        'luasLot'       => 'required',
                        'noLot'         => 'required',
                        'luasUsaha'     => 'required|numeric'
                    ]);


        $region = Locality::where('id', $request->locality_id)->first();
        $request['region_id']   = $region->region_id;

        // store here
        if(Season::create($request->all())) {

            Session::put('musim', $request['musim']);
            Session::put('fasa', $request['fasa']);
            Session::put('locality_id', $request['locality_id']);

            Session::flash('success', 'Berjaya');
            return redirect()->route('tanaman');
        } else {
            return redirect('form.carianPesawah')->withInput($request->all());
        }

    }

    public function tanaman() {

        // dd(Session::all());

        $varieties  = Variety::all();
        $methods    = Method::all();

        $farmer = Farmer::where('id', Session::get('pesawah_id'))->first();

        return view('forms.tanaman')
                ->with('farmer', $farmer)
                ->with('varieties', $varieties)
                ->with('methods', $methods);
    }

    public function storeTanaman(Request $request) {

        // dd($request->all());

        $tanaman = $request->validate([
                    'nama'          => 'required',
                    'variety_id'    => 'required|numeric',
                    'method_id'     => 'required|numeric',
                    'tarikh_tanam'  => 'required|date',
                    'tuaiSebenar'   => 'required|date'

                ]);

        dd('success');

        // tarikh dijangka tuai -> auto generate + 110 hari
    }


}
