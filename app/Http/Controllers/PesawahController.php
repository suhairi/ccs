<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class PesawahController extends Controller
{
    public function index() {
        return view('forms.pesawah');
    }

    public function store(Request $request) {

        // dd(request()->all());

        $attributes = $request->validate([
            'nama'      => 'required|min:5',
            'nokp'      => 'required|numeric|size:12',
            'pendidikan'=> 'required|min:3',
            'notel'     => 'required|numeric',
            'alamat'    => 'required|min:10'
        ]);

        // Auto : jantina, umur
        // store into database
        $jantina    = $this->getJantina(substr($request['nokp'], -1));
        $umur       = $this->getUmur($request['nokp']);


        return 'Done';
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
