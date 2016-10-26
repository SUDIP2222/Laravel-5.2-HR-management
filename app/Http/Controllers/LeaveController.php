<?php

namespace App\Http\Controllers;

use App\Leave;
use Illuminate\Http\Request;

use App\Http\Requests;

class LeaveController extends Controller
{
    public function create(){
        return view('leave.create');
    }

    public function store(Request $request){

        // dd($request->get('leavetype'));

        $this->validate($request,[
                "leavetype.*" => "required",
        ]);

        foreach($request->get('leavetype') as $item){
            $leave=new Leave();
            $leave->leavetype=$item;
            $leave->save();
        }

        return redirect()->back();

    }
}
