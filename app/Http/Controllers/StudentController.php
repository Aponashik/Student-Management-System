<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Classes;
use App\Student;
use Intervention\Image\Facades\Image;

class StudentController extends Controller
{
    public function index()
    {
    	$datas=Student::all();

        
    	return view('student.index',compact('datas'));
    }

    public function create()
    {
    	$departments=Department::all();
    	$classes=Classes::all();
    	return view('student.create',compact('departments','classes'));
    }

    public function save(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'phone_number'=>'required',
    		'reg_id'=>'required',
            'address'=>'required',
    		'image'=>'required'

    	]);

        $stdImage='';
        if ($request->hasFile('image')) 
            {
                $image=$request->file('image');
                
                $filename=time(). '.'.$image->clientExtension();
                Image::make($image)->save(public_path('uploads/students/'.$filename));
                
                $stdImage=$filename;
            }

    	Student::create([
    		'name'=>$request->name,
    		'phone_number'=>$request->phone_number,
    		'email'=>$request->email,
    		'roll'=>$request->roll,
    		'reg_id'=>$request->reg_id,
    		'department_id'=>$request->department_id,
    		'classes_id'=>$request->classes_id,
    		'address'=>$request->address,
    		'father_name'=>$request->father_name,
    		'mother_name'=>$request->mother_name,
            'image'=>$stdImage,
    		
    	]);

    	return redirect()->back()->with('status','Student Added Successfully!');
    }

      public function edit($id)
    {
    	$data=Student::find($id);
    	$departments=Department::all();
    	$classes=Classes::all();


    	return view('student.edit',compact('data','departments','classes'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'phone_number'=>'required',
    		'reg_id'=>'required',
    		'address'=>'required'

    	]);
    	$data=Student::find($id);
    	$data->update($request->all());

    	return redirect()->back()->with('status','Student Updated Successfully');



    }
    public function delete($id)
    {
    	$data=Student::find($id);
    	$data->delete();
    	return redirect()->back()->with('status','Student Deleted Successfuly!');

    }
}
