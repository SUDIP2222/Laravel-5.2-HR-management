<?php

namespace App\Http\Controllers;



use App\Suspension;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class SuspensionController extends Controller
{
    public function index(){
        $suspensions=Suspension::all();
        return view('suspension.index',compact('suspensions'));
    }
    public function create(){

        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');
        //dd($users);

        return view('suspension.create',compact('users'));
    }


    public function store(Request $request){
        //dd($request->all());
        $this->validate($request,[
            "user_id" => "required",
            "suspension_date" => "required",
            "reason" => "required",
            "duration" => "required",
        ]);

        $suspentions=Suspension::create($request->all());
    }

    public function edit($id){
        $suspension=Suspension::find($id);
        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');
        return view('suspension.edit',compact('suspension','users'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "user_id" => "required",
            "suspension_date" => "required",
            "reason" => "required",
            "duration" => "required",
        ]);

        Suspension::find($id)->update($request->all());

        return redirect('admin/suspensions');

    }

    public function delete($id){
        $suspension=Suspension::findOrFail($id);
        $suspension->delete();
        return redirect()->back();
    }
}
