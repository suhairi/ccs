<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Farmer;
use App\Models\Education;
use App\Models\Milikan;



class FarmerController extends Controller
{

    public function index() {

        $educations = Education::pluck('nama', 'id');
        $milikans   = Milikan::all();

        return view('forms.pesawah')
                ->with('educations', $educations)
                ->with('milikans', $milikans);
    }


    public function store(Request $request) {

        // dd(request()->all());

        $attributes = $request->validate([
            'nama'          => 'required|min:5',
            'nokp'          => 'required|numeric|unique:farmers',
            'education_id'  => 'required',
            'notel'         => 'required|numeric',
            'milikan_id'    => 'required',
            'alamat'        => 'required|min:10'
        ]);

        // Auto : jantina, umur
        // store into database
        $request['jantina']    = $this->getJantina(substr($request['nokp'], -1));
        $request['umur']       = $this->getUmur($request['nokp']);

        // dd($request['umur']);

        // Housekeeping
        $request['nama'] = ucwords($request->nama);

        if(Farmer::create($request->all())) {

            Session::flash('success', 'Berjaya');
            return redirect('pesawah');
        } else {
            return redirect('pesawah')->withInput($request->all());
        }

        
    }

    protected function getJantina($nokp) {

        if($nokp % 2 == 0)
            return "PEREMPUAN";
        else 
            return "LELAKI";
    }


    protected function getUmur($nokp) {

        $tarikh     = substr($nokp, 0, 6);
        $tarikh1    = substr($tarikh, 0, 2);
        $tarikh2    = substr($tarikh, 2, 2);
        $tarikh3    = substr($tarikh, 4, 2);

        $year       = date('Y');
        $year       = substr($year, 2, 2);

        if($tarikh1 > $year)
            $tarikh1 = '19' . $tarikh1;
        else
            $tarikh1 = '20' . $tarikh1;

        $tarikh     = $tarikh1 . '-' . $tarikh2 . '-' . $tarikh3;
        $age     = Carbon::createFromFormat('Y-m-d', $tarikh)->age;
        
        return $age;
    }

    public function pesawah(Request $request) {

        // dd($request->all());

        $educations     = Education::all();
        $farmer         = Farmer::findOrFail($request['id']);
        $milikans       = Milikan::all();

        return view('lists.pesawah2')
                ->with('farmer', $farmer)
                ->with('educations', $educations)
                ->with('milikans', $milikans);
    }

    public function pesawahUpdate(Request $request) {

        // dd($request->all());

        $farmer                 = Farmer::findOrFail($request['farmer_id']);
        $farmer->nokp           = $request['nokp'];
        $farmer->education_id   = $request['education_id'];
        $farmer->milikan_id     = $request['milikan_id'];
        $farmer->notel          = $request['notel'];
        $farmer->alamat         = $request['alamat'];
        $farmer->save();

        Session::flash('success', 'Berjaya.');
        return redirect()->route('senaraiPesawah');
    }


}
