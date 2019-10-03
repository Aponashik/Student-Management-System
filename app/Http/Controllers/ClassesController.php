<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassesController extends Controller
{
    public function index()
    {
    	$datas=Classes::all();
    	return view('class.index',compact('datas'));
    }
    public function create()
    {
    	return view('class.create');
    }
    public function save(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required'
    	]);
    	Classes::create([
    		'title'=>$request->title

    	]);
    	return redirect()->back()->with('status','Class Added Successfully');
    }

    public function delete($id)
    {
    	$cl=Classes::find($id);
    	$cl->delete();
    	return redirect()->back()->with('status','Class Deleted Successfully');

    }
    public function edit($id)
    {
    	$data=Classes::find($id);
    	return view('class.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'title'=>'required'
    	]);

    	$data=Classes::find($id);
    	$data->title=$request->title;
    	$data->save();
    	return redirect()->back()->with('status','Class Updated Successfully');
    }
}
