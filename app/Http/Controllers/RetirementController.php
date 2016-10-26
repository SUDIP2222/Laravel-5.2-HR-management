<?php

namespace App\Http\Controllers;

use App\Retirement;
use App\Suspension;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class RetirementController extends Controller
{

    public function index(){
        $retirements=Retirement::all();
        return view('retirement.index',compact('retirements'));
    }
    public function create(){

        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');
        //dd($users);

        return view('retirement.create',compact('users'));
    }

    public function store(Request $request){

       // dd($request->all());

        $this->validate($request,[
            "user_id" => "required",
            "retirement_date" => "required",
            "award" => "required",
        ]);

        $retirements=Retirement::create($request->all());

        return redirect('admin/retirements');

    }

    public function edit($id){
        $retirement=Retirement::find($id);
        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');
        return view('retirement.edit',compact('retirement','users'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "user_id" => "required",
            "retirement_date" => "required",
            "award" => "required",
        ]);

        Retirement::find($id)->update($request->all());

        return redirect('admin/retirements');

    }

    public function delete($id){
        $retirement=Retirement::findOrFail($id);
        $retirement->delete();
        return redirect()->back();
    }
}
