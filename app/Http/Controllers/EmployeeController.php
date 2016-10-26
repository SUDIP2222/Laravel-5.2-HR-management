<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class EmployeeController extends Controller
{

    public function index(){
        $users=User::all();
        return view('employee.adminindex',compact('users'));
    }
    public function create(){
        return view("employee.create");
    }

    public function store(Request $request){
       // dd($request->all());
        $this->validate($request,[
            "name" => "required",
            "date" => "required",
            "gender" => "required",
            "phone" => "required",
            "qualification" => "required",
            "address" => "required",
            "paddress" => "required",
            "email" => "required",
            "password" => "required",
            "employeeid" => "required",
            "department" => "required",
            "designation" => "required",
            "dateofjoining" => "required",
            "optradio" => "required",
            "Salary" => "required",
            "bankname" => "required",
            "accountholder" =>"required",
            'accountnum'=>"required",
        ]);


        $request['password']= bcrypt($request->get('password'));
        $employee=User::create($request->all());

        return redirect('admin/employees');
    }

    public function edit($id){
        $user=User::find($id);
        return view('employee.edit',compact('user'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "name" => "required",
            "date" => "required",
            "gender" => "required",
            "phone" => "required",
            "qualification" => "required",
            "address" => "required",
            "paddress" => "required",
            "email" => "required",

            "employeeid" => "required",
            "department" => "required",
            "designation" => "required",
            "dateofjoining" => "required",
            "optradio" => "required",
            "Salary" => "required",
            "bankname" => "required",
            "accountholder" =>"required",
            'accountnum'=>"required",
        ]);
        User::find($id)->update($request->all());

        return redirect('admin/employees');

    }

    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }


}
