<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class PromotionController extends Controller
{

    public function index(){
        $promotions =Promotion::all();
       // dd($promotions);
        return view('promotion.index',compact('promotions'));
    }
    public function create(){

        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');

        //dd($users);
        return view('promotion.create',compact('users'));
    }

    public function store(Request $request){
        //dd($request->all());

        $this->validate($request,[
            "user_id" => "required|unique:promotions",
            "Promotion_Date" => "required",
            "previous_department" => "required",
            "present_department" => "required",
            "previous_designation" => "required",
            "present_designation" => "required",
            "previous_salary" => "required",
            "present_salary" => "required"
        ]);

        $promotions=Promotion::create($request->all());
        return redirect('admin/promotions');
    }

    public function edit($id){
        $promotion=Promotion::find($id);
        $users=User::selectRaw('CONCAT(employeeid,"(",name,")") as full_name,id')->lists('full_name','id');
        return view('promotion.edit',compact('promotion','users'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "user_id" => "required",
            "Promotion_Date" => "required",
            "previous_department" => "required",
            "present_department" => "required",
            "previous_designation" => "required",
            "present_designation" => "required",
            "previous_salary" => "required",
            "present_salary" => "required"
        ]);

        Promotion::find($id)->update($request->all());

        return redirect('admin/promotions');

    }

    public function delete($id){
        $promotion=Promotion::findOrFail($id);
        $promotion->delete();
        return redirect()->back();
    }
}
