<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
    	$departments=Department::all();
    	return view('department.index',compact('departments'));
    }
    public function create()
    {
    	return view('department.create');
    }
    public function save(Request $request)
    {
    	$this->validate($request,[
    		'title'=>'required'
    	]);

    	Department::create([
    		'title'=>$request->title
    	]);
    	return redirect()->back()->with('status','Department Added Successfuly!');
    }

    public function edit($id)
    {
    	$department=Department::find($id);

    	return view('department.edit',compact('department'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'title'=>'required'
    	]);
    	$dept=Department::find($id);
    	$dept->title=$request->title;
    	$dept->save();
    		return redirect()->back()->with('status','Department Updated Successfuly!');

    }
    public function Delete($id)
    {
    	    	$dept=Department::find($id);
    	    	$dept->delete();
    	return redirect()->back()->with('status','Department Deleted Successfuly!');

    }
    
}
