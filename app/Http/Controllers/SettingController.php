<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Education;
use App\Models\Locality;

class SettingController extends Controller
{
    public function index() {

        $users = User::all();

        // dd($users);

        return view('settings.index')->with('users', $users);


    }

    public function destroy(Request $request) {

        if($request->id == 1) {

            Session::flash('error', 'User cannot be deleted. This user is protected.');

            return redirect()->back();
        }

        $user = User::where('id', $request->id)->delete();

        if($user) {

            Session::flash('success', 'User has been deleted');
            return redirect()->route('settings.users');
        } else {

            Session::flash('error', 'User cannot be deleted');
            return redirect()->route('settings.users');
        }

    }

    public function education() {

        $educations = Education::all();

        return view('settings.educations')->with('educations', $educations);
    }

    public function delEdu(Request $request) {

        $education = Education::where('id', $request->id)->delete();

        if($education) {

            Session::flash('success', 'Education has been deleted');
            return redirect()->route('settings.educations');
        } else {

            Session::flash('error', 'Education cannot be deleted');
            return redirect()->route('settings.educations');
        }
    }

    public function locality() {

        $localities = Locality::all();

        return view('settings.localities')->with('localities', $localities);
    }

    public function delLocality(Request $request) {

        $education = Education::where('id', $request->id)->delete();

        if($education) {

            Session::flash('success', 'Education has been deleted');
            return redirect()->route('settings.educations');
        } else {

            Session::flash('error', 'Education cannot be deleted');
            return redirect()->route('settings.educations');
        }
    }

    



}
