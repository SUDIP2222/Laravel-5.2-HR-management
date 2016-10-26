<?php

namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;

use App\Http\Requests;

class NoticeController extends Controller
{

    public function index(){
        $notices=Notice::all();
        return view('notice.index',compact('notices'));
    }
    public function create(){
        return view('notice.create');
    }

    public function store(Request $request){

       // dd($request->all());
        $this->validate($request,[
            "notice_title" => "required",
            "description" => "required",
        ]);

        $notices=Notice::create($request->all());
        return redirect('admin/notices');
    }

    public function edit($id){
        $notice=Notice::find($id);
        return view('notice.edit',compact('notice'));
    }

    public function update(Request $request,$id){

        $this->validate($request,[
            "notice_title" => "required",
            "description" => "required",
        ]);

        Notice::find($id)->update($request->all());

        return redirect('admin/notices');

    }

    public function delete($id){
        $notice=Notice::findOrFail($id);
        $notice->delete();
        return redirect()->back();
    }
}
