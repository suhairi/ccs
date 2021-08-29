<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
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

        return 'Done';
    }
}
