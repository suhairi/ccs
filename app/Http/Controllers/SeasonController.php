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
use App\Models\Fertilizer;
use App\Models\Fertilization;
use App\Models\Issue;
use App\Models\Hasil;
use App\Models\Musim;


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

        Session::put('farmer_id', $id);

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

        // dd($request->farmer_id);

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

        $musim = Musim::where('status', 1)->first();
        // dd($musim->tahun);
        $request['musim_id'] = $musim->id;
        $request['tahun'] = $musim->tahun;

        Session::put('phase', $request['phase']);
        Session::put('locality_id', $request['locality_id']);   

        // Check wether the farmer's SEASON has been recorded.

        $farmer = Season::where('farmer_id', $request['farmer_id'])
                        ->where('phase', $request['phase'])
                        ->where('locality_id', $request['locality_id'])
                        ->first();

        if($farmer) {

            Session::flash('success', 'Data telah wujud.');

            // redirect to CROP
            return redirect()->route('tanaman');
        }

        // store here
        if($season = Season::create($request->all())) {

            Session::put('season_id', $season->id);

            Session::flash('success', 'Berjaya');
            return redirect()->route('tanaman');
        } else {
            return redirect('forms.carianPesawah')->withInput($request->all());
        }

    }

    public function tanaman() {

        $varieties  = Variety::all();
        $methods    = Method::all();

        $farmer = Farmer::where('id', Session::get('farmer_id'))->first();

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

        $request['tarikhJangkaTuai'] = $tarikhJangkaTuai;
        // $request['farmer_id'] = Session::get('farmer_id');
        $request['season_id'] = Session::get('season_id');
        $request['locality_id'] = Session::get('locality_id');

        unset($request['farmer_id']);

        // dd($request->all());

        // Check wether the farmer's CROP has been recorded.

        $farmer = Crop::where('season_id', $request['season_id'])
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

        $farmer = Farmer::where('id', Session::get('farmer_id'))->first();

        return view('forms.fertilizer')
                ->with('farmer', $farmer);
    }

    public function storeFertilizer(Request $request) {

        // dd($request->all());

        // Check if season_id already existed

        $fertilization  = Fertilization::where('season_id', $request['season_id'])->get();

        if(!empty($fertilization)) {

            Session::flash('success', 'Berjaya.');
            return redirect()->route('issues');
        }


        // dd($fertilization);

        // Store SEBATIAN -> Fertilizer_id = 1

        if($request['sebatian1Date'] != null) {

            $sebatian = new Fertilization;

            $sebatian->fertilizer_id    = 1;
            $sebatian->season_id        = $request['season_id'];
            $sebatian->kekerapan        = 1;
            $sebatian->tarikh           = $request['sebatian1Date'];
            $hlt                        = Carbon::createFromFormat('Y-m-d', $request['sebatian1Date']);
            $hlt                        = $hlt->addDays(110);
            $sebatian->hlt              = $hlt->format('Y-m-d');
            $sebatian->kgPerRelung      = $request['sebatian1'];
            $sebatian->kgPerHektar      = $request['sebatian1'] / 3.475;
            $sebatian->save();

            if($request['sebatian2Date'] != null) {

                $sebatian = new Fertilization;
                $sebatian->fertilizer_id    = 1;
                $sebatian->season_id        = $request['season_id'];
                $sebatian->kekerapan        = 2;
                $sebatian->tarikh           = $request['sebatian2Date'];
                $hlt                        = Carbon::createFromFormat('Y-m-d', $request['sebatian2Date']);
                $hlt                        = $hlt->addDays(110);
                $sebatian->hlt              = $hlt->format('Y-m-d');
                $sebatian->kgPerRelung      = $request['sebatian2'];
                $sebatian->kgPerHektar      = $request['sebatian2'] / 3.475;
                $sebatian->save();
            }
        }

        // Store UREA -> Fertilizer_id = 2

        if($request['urea1Date'] != null) {
            $urea = new Fertilization;

            $urea->fertilizer_id    = 2;
            $urea->season_id        = $request['season_id'];
            $urea->kekerapan        = 1;
            $urea->tarikh           = $request['urea1Date'];
            $hlt                    = Carbon::createFromFormat('Y-m-d', $request['urea1Date']);
            $hlt                    = $hlt->addDays(110);
            $urea->hlt              = $hlt->format('Y-m-d');
            $urea->kgPerRelung      = $request['urea1'];
            $urea->kgPerHektar      = $request['urea1'] / 3.475;
            $urea->save();

            if($request['urea2Date'] != null) {

                $urea = new Fertilization;
                $urea->fertilizer_id    = 2;
                $urea->season_id        = $request['season_id'];
                $urea->kekerapan        = 2;
                $urea->tarikh           = $request['urea2Date'];
                $hlt                    = Carbon::createFromFormat('Y-m-d', $request['urea2Date']);
                $hlt                    = $hlt->addDays(110);
                $urea->hlt              = $hlt->format('Y-m-d');
                $urea->kgPerRelung      = $request['urea2'];
                $urea->kgPerHektar      = $request['urea2'] / 3.475;
                $urea->save();
            }
        }

        // Store SEBATIAN TAMBAHAN -> Fertilizer_id = 3

        if($request['tambahan1Date'] != null) {
            $tambahan = new Fertilization;

            $tambahan->fertilizer_id    = 3;
            $tambahan->season_id        = $request['season_id'];
            $tambahan->kekerapan        = 1;
            $tambahan->tarikh           = $request['tambahan1Date'];
            $hlt                        = Carbon::createFromFormat('Y-m-d', $request['tambahan2Date']);
            $hlt                        = $hlt->addDays(110);
            $tambahan->hlt              = $hlt->format('Y-m-d');
            $tambahan->kgPerRelung      = $request['tambahan1'];
            $tambahan->kgPerHektar      = $request['tambahan1'] / 3.475;
            $tambahan->save();

            if($request['tambahan2Date'] != null) {

                $tambahan = new Fertilization;
                $tambahan->fertilizer_id    = 3;
                $tambahan->season_id        = $request['season_id'];
                $tambahan->kekerapan        = 2;
                $tambahan->tarikh           = $request['tambahan2Date'];
                $hlt                        = Carbon::createFromFormat('Y-m-d', $request['tambahan2Date']);
                $hlt                        = $hlt->addDays(110);
                $tambahan->hlt              = $hlt->format('Y-m-d');
                $tambahan->kgPerRelung      = $request['tambahan2'];
                $tambahan->kgPerHektar      = $request['tambahan2'] / 3.475;
                $tambahan->save();
            }
        }

        // Store BAJA LAIN -> Fertilizer_id = 4

        if($request['lain1Date'] != null) {

            $lain = new Fertilization;

            dd($request->all());

            $lain->fertilizer_id    = 4;
            $lain->season_id        = $request['season_id'];
            $lain->kekerapan        = 1;
            $lain->tarikh           = $request['lain1Date'];
            $hlt                    = Carbon::createFromFormat('Y-m-d', $request['lain1Date']);
            $hlt                    = $hlt->addDays(110);
            $lain->hlt              = $hlt->format('Y-m-d');
            $lain->kgPerRelung      = $request['lain1'];
            $lain->kgPerHektar      = $request['lain1'] / 3.475;
            $lain->save();

            if($request['lain2Date'] != null) {

                $lain = new Fertilization;
                $lain->fertilizer_id    = 4;
                $lain->season_id        = $request['season_id'];
                $lain->kekerapan        = 2;
                $lain->tarikh           = $request['lain2Date'];
                $hlt                    = Carbon::createFromFormat('Y-m-d', $request['lain2Date']);
                $hlt                    = $hlt->addDays(110);
                $lain->hlt              = $hlt->format('Y-m-d');
                $lain->kgPerRelung      = $request['lain2'];
                $lain->kgPerHektar      = $request['lain2'] / 3.475;
                $lain->save();
            }
        }
        
        
        Session::flash('success', 'Berjaya.');
        return redirect()->route('issues');        

    }

    public function issues() {

        // dd(Session::all());

        $farmer = Farmer::where('id', Session::get('farmer_id'))->first();

        return view('forms.issues')->with('farmer', $farmer);
    }

    public function storeIssues(Request $request) {

        // dd($request->all());

        // Perosak

        if($request['tikus'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Tikus';
            $issue->peratus     = $request['tikus'];
            $issue->save();
        }

        if($request['siputGondang'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Siput Gondang Emas';
            $issue->peratus     = $request['siputGondang'];
            $issue->save();
        }

        if($request['kutuThrip'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Kutu Thrip';
            $issue->peratus     = $request['kutuThrip'];
            $issue->save();
        }

        if($request['pengorekBatang'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Ulat Pengorek Batang';
            $issue->peratus     = $request['pengorekBatang'];
            $issue->save();
        }

        if($request['gulungDaun'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Ulat Gulung Daun';
            $issue->peratus     = $request['gulungDaun'];
            $issue->save();
        }

        if($request['ulatLayar'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Ulat Layar';
            $issue->peratus     = $request['ulatLayar'];
            $issue->save();
        }

        if($request['benaPerang'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Bena Perang';
            $issue->peratus     = $request['benaPerang'];
            $issue->save();
        }

        if($request['kesing'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Perosak';
            $issue->nama        = 'Kesing';
            $issue->peratus     = $request['kesing'];
            $issue->save();
        }      

        // Penyakit

        if($request['karah'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Penyakit';
            $issue->nama        = 'Karah';
            $issue->peratus     = $request['karah'];
            $issue->save();
        }

        if($request['daunBakteria'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Penyakit';
            $issue->nama        = 'Hawar Daun Bakteria';
            $issue->peratus     = $request['daunBakteria'];
            $issue->save();
        }

        if($request['hawarSeludang'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Penyakit';
            $issue->nama        = 'Hawar Seludang';
            $issue->peratus     = $request['hawarSeludang'];
            $issue->save();
        }

        if($request['bintikPerang'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Penyakit';
            $issue->nama        = 'Bintik Perang';
            $issue->peratus     = $request['bintikPerang'];
            $issue->save();
        }

        // Bencana

        if($request['rebah'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Bencana';
            $issue->nama        = 'Rebah';
            $issue->peratus     = $request['rebah'];
            $issue->save();
        }

        if($request['kemarau'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Bencana';
            $issue->nama        = 'Kemarau';
            $issue->peratus     = $request['kemarau'];
            $issue->save();
        }

        if($request['banjir'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Bencana';
            $issue->nama        = 'Banjir';
            $issue->peratus     = $request['banjir'];
            $issue->save();
        }

        if($request['bencanaLain'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Bencana';
            $issue->nama        = 'Bencana Lain';
            $issue->peratus     = $request['bencanaLain'];
            $issue->save();
        }

        // // Isu Lain

        if($request['peratusIsuLain'] > 0) {
            $issue              = new Issue;
            $issue->season_id   = Session::get('season_id');
            $issue->kategori    = 'Lain';
            $issue->nama        = $request['isuLain'];
            $issue->peratus     = $request['peratusIsuLain'];
            $issue->save();
        }
       
        Session::flash('success', 'Berjaya.');
        return redirect()->route('rujukan');

    }


    public function rujukan() {

        $farmer = Farmer::where('id', Session::get('farmer_id'))->first();

        return view('forms.rujukan')->with('farmer', $farmer);
    }

    public function storeRujukan(Request $request) {

        // dd($request->all());

        $rujukan = $request->validate([
                'rujukan'       => 'required',
                'hasilLot'      => 'required|numeric',
                'hasilKgHektar' => 'required|numeric'
            ]);

        $request['season_id'] = Session::get('season_id');

        $rujukan = Hasil::create($request->all());

        Session::flash('success', 'Berjaya');

        return redirect()->route('musim');
    }



}
