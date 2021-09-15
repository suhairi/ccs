<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Farmer;
use App\Models\Region;
use App\Models\Locality;
use App\Models\Season;

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

        // dd($request->all());

        $attributes = $request->validate([
                        'nama'      => 'required',
                        'musim'     => 'required|numeric',
                        'luasLot'   => 'required',
                        'noLot'     => 'required',
                        'luasUsaha' => 'required|numeric'
                    ]);


        $region = Locality::where('id', $request->locality_id)->first();
        $request['region_id']   = $region->region_id;

        // store here
        if(Season::create($request->all())) {

            Session::flash('success', 'Berjaya');
            return view('forms.carianPesawah');
        } else {
            return redirect('form.carianPesawah')->withInput($request->all());
        }

    }


}
