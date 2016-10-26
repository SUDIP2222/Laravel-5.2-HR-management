<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class AuthController extends Controller
{

    public function getLogin(){
        return view('user.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);

        if(!Auth::attempt(['email' =>$request->input('email'), 'password' =>$request->input('password')],$request->has('remember'))){

            return redirect()->back();
        }

        return redirect('home');
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/login');
    }
}
