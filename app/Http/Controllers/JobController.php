<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Requests;

class JobController extends Controller
{
    public function index(){
        $jobs=Job::all();

        return view('job.index',compact('jobs'));
    }
    public function create(){
        return view("job.create");
    }

    public function store(Request $request){
       // dd($request->all());
        $this->validate($request,[
            "position" => "required",
            "description" => "required",
            "post_date" => "required",
            "last_date_to_apply" => "required",
            "close_date" => "required"
        ]);

        Job::create($request->all());
        return redirect('admin/jobs');

    }

    public function edit($id){
        $job=Job::find($id);

        return view('job.edit',compact('job'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "position" => "required",
            "description" => "required",
            "post_date" => "required",
            "last_date_to_apply" => "required",
            "close_date" => "required"
        ]);

        Job::find($id)->update($request->all());

        return redirect('admin/jobs');

    }

    public function delete($id){
        $job=Job::findOrFail($id);
        $job->delete();
        return redirect()->back();
    }
}
