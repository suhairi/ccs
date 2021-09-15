<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\Farmer;
use App\Models\Education;



class FarmerController extends Controller
{

    public function index() {

        $educations = Education::all();

        dd($educations);

        return view('forms.pesawah');
    }


    public function store(Request $request) {

        // dd(request()->all());

        $attributes = $request->validate([
            'nama'          => 'required|min:5',
            'nokp'          => 'required|numeric|unique:farmers',
            'education_id'  => 'required',
            'notel'         => 'required|numeric',
            'milikan'       => 'required',
            'alamat'        => 'required|min:10'
        ]);

        // Auto : jantina, umur
        // store into database
        $request['jantina']    = $this->getJantina(substr($request['nokp'], -1));
        $request['umur']       = $this->getUmur($request['nokp']);

        // dd($request->all());

        // Housekeeping
        $request['nama'] = ucwords($request->nama);

        if(Farmer::create($request->all())) {

            Session::flash('success', 'Berjaya');
            return view('forms.pesawah');
        } else {
            return redirect('form.pesawah')->withInput($request->all());
        }

        
    }


    protected function getJantina($nokp) {

        if($nokp % 2 == 0)
            return "PEREMPUAN";
        else 
            return "LELAKI";
    }


    protected function getUmur($nokp) {

        return 12;
    }
}
