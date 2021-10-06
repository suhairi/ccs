<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

use App\Models\Farmer;
use App\Models\Region;
use App\Models\Locality;
use App\Models\Season;
use App\Models\Variety;
use App\Models\Method;
use App\Models\Crop;


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
                        'season_id'     => 'required|numeric',
                        'phase'         => 'required|numeric',
                        'locality_id'   => 'required|numeric',
                        'luasLot'       => 'required',
                        'noLot'         => 'required',
                        'luasUsaha'     => 'required|numeric'
                    ]);


        $region = Locality::where('id', $request->locality_id)->first();
        $request['region_id']   = $region->region_id;

        Session::put('phase', $request['phase']);
        Session::put('season_id', $request['season_id']);
        Session::put('locality_id', $request['locality_id']);   

        // Check wether the farmer's SEASON has been recorded.

        $farmer = Season::where('pesawah_id', $request['pesawah_id'])
                        ->where('season_id', $request['season_id'])
                        ->where('phase', $request['phase'])
                        ->where('locality_id', $request['locality_id'])
                        ->first();

        if($farmer) {

            Session::flash('success', 'Data telah wujud.');

            // redirect to CROP
            return redirect()->route('tanaman');
        }

        // store here
        if(Season::create($request->all())) {

            Session::flash('success', 'Berjaya');
            return redirect()->route('tanaman');
        } else {
            return redirect('forms.carianPesawah')->withInput($request->all());
        }

    }

    public function tanaman() {

        $varieties  = Variety::all();
        $methods    = Method::all();

        $farmer = Farmer::where('id', Session::get('pesawah_id'))->first();

        return view('forms.tanaman')
                ->with('farmer', $farmer)
                ->with('varieties', $varieties)
                ->with('methods', $methods);
    }

    public function storeTanaman(Request $request) {

        $tanaman = $request->validate([
                    'nama'              => 'required',
                    'variety_id'        => 'required|numeric',
                    'tarikhTanam'       => 'required|date',
                    'tarikhTuaiSebenar' => 'required|date',
                    'nama'              => 'required',
                    'method_id'         => 'required|numeric',
                    'tarikhTanam'       => 'required|date',
                    'tarikhTuaiSebenar' => 'required|date'

                ]);


        // tarikh dijangka tuai -> auto generate + 110 hari
        $tarikhJangkaTuai = Carbon::createFromFormat('Y-m-d', $request->tarikhTanam);
        $tarikhJangkaTuai = $tarikhJangkaTuai->addDays(110);

        // dd(Session::all());

        $request['tarikhJangkaTuai'] = $tarikhJangkaTuai;
        $request['pesawah_id'] = Session::get('pesawah_id');
        $request['season_id'] = Session::get('season_id');
        $request['locality_id'] = Session::get('locality_id');

        // Check wether the farmer's CROP has been recorded.

        $farmer = Crop::where('pesawah_id', $request['pesawah_id'])
                        ->where('season_id', $request['season_id'])
                        ->first();

        if($farmer == null) {

            if(Crop::create($request->all())) {

                Session::flash('success', 'Berjaya');
                return redirect()->route('pembajaan');
            } else {
                return redirect('forms.musim')->withInput($request->all());
            }
        } else {

            Session::flash('fail', 'Sudah direkod sebelum ini.');
            return redirect()->route('pembajaan');
        }

       
    }

    public function pembajaan() {

        $farmer = Farmer::where('id', Session::get('pesawah_id'))->first();

        return view('forms.fertilizer')
                ->with('farmer', $farmer);
    }


}
