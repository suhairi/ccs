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

    public function userUpdateForm(Request $request) {

        $user = User::where('id', $request->id)->first();

        return view('settings.user')->with('user', $user);

    }

    public function userUpdate(Request $request) {

        // dd($request->all());

        $user = $request->validate([
                    'name'      => 'required',
                    'email'     => 'required|email',
                    'password'  => 'required|min:7'
                ]);

        $user = User::where('id', $request->id)->first();

        $user->password = bcrypt($request->password);

        if($user->save()) {

            Session::flash('success', 'Berjaya');
            return redirect()->route('settings.users');

        } else {

            return redirect()->route('settings.user.update')->withInput($request->all());
        }
    }

    public function educationUpdateForm(Request $request) {

        $education = Education::where('id', $request->id)->first();

        return view('settings.educationUpdate')->with('education', $education);
    }

    public function educationUpdate(Request $request) {

        $education = $request->validate([
                        'nama'  => 'required'
                    ]);

        $education = Education::where('id', $request->id)->first();
        $education->nama = $request->nama;

        if($education->save()) {

            Session::flash('success', 'Berjaya');
            return redirect()->route('settings.educations');
        } else {

            return redirect()->route('settings.education.update');
        }
    }

    public function tailwind() {

        return view('settings.tailwind');
    }

    



}
