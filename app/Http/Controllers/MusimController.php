<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Musim;

class MusimController extends Controller
{
    public function index() {

        $musim = Musim::where('status', 1)->first();

        return view('settings.musim')->with('musim', $musim);
    }

    public function update(Request $request) {

        // dd($request->all());

        $musim = Musim::where('status', 1)->first();
        $musim->status = 0;
        $musim->save();

        $musim = new Musim;
        $musim->status  = 1;
        $musim->musim   = $request['musim'];
        $musim->tahun   = $request['tahun'];
        $musim->save();

        Session::flash('success', 'Berjaya');

        return redirect()->route('settings.musim');
    }
}
