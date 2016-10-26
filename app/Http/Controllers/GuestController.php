<?php

namespace App\Http\Controllers;

use App\Guest;
use Illuminate\Http\Request;

use App\Http\Requests;

class GuestController extends Controller
{
    public function create(){
        return view('guest.create');
    }

    public function store(Request $request){

        // dd($request->all());
        $this->validate($request,[
            "notice_title" => "required",
            "description" => "required",
        ]);

        $guests=Guest::create($request->all());
        return redirect()->back();
    }
}
