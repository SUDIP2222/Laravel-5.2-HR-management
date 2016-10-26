<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class SettingController extends Controller
{
    public function edit(){
        return view('setting.edit');
    }

    public function updateDetail(Request $request){
        //dd($request->all());
        $this->validate($request,[
            "name" => "required",
            "email" => "required",
        ]);

        $users=User::find(Auth::user()->id);
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->save();

        return redirect()->back();

    }

    public function updatePassword(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'password' => 'required|min:6|confirmed',
        ]);

        $users=User::find(Auth::user()->id);
        $users->password=bcrypt($request->get('password'));
        $users->save();

        return redirect()->back();

    }

    public function userEdit(){
        return view('setting.userEdit');
    }

    public function updateUserDetail(Request $request){
        //dd($request->all());
        $this->validate($request,[
            "name" => "required",
            "email" => "required",
        ]);

        $users=User::find(Auth::user()->id);
        $users->name=$request->get('name');
        $users->email=$request->get('email');
        $users->save();

        return redirect()->back();

    }

    public function updateUserPassword(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'password' => 'required|min:6|confirmed',
        ]);

        $users=User::find(Auth::user()->id);
        $users->password=bcrypt($request->get('password'));
        $users->save();

        return redirect()->back();

    }
}
