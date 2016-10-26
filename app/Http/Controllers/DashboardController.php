<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Notice;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index(){
       $totaluser = DB::table('users')->count();
        $notices=Notice::all();
        return view('Deshboard.index',compact('totaluser','notices'));
    }

    public function store(Request $request){
        $this->validate($request,[
            "notice_title" => "required",
            "description" => "required",
        ]);

        $notices=Notice::create($request->all());

        return redirect('admin/dashboard');
    }
}
