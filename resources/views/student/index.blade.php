@extends('layouts.app')
@section('title','Student')

@section('content')
<h3 align="center">Student List</h3>
 @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">Name</th>
      <th scope="col">Image</th>
      <th scope="col">Father Name</th>
      <th scope="col">Mother Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Department</th>
      <th scope="col">Class</th>
      <th scope="col">Roll</th>
      <th scope="col">Reg Id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($datas as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->name}}</td>
      <td><img src="{{url('uploads/students/',$data->image)}}" style="height: 50px;width: 50px;"></td>
      <td>{{$data->father_name}}</td>
      <td>{{$data->mother_name}}</td>
      <td>{{$data->email}}</td>
      <td>{{$data->phone_number}}</td>
      <td>{{$data->address}}</td>
      <td>{{$data->department->title}}</td>
      <td>{{$data->classes->title}}</td>
      <td>{{$data->roll}}</td>
      <td>{{$data->reg_id}}</td>
      
      <td><a href="{{url('student/edit',$data->id)}}" class="hrf">Edit</a> || 
        <form id="delete-form-{{$data->id}}" method="post" action="{{url('student/delete',$data->id)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}  
          </form>

          <a href="" onclick="
          if(confirm('Are Yiu sure to delete this?'))
          {
            event.preventDefault();
            document.getElementById('delete-form-{{$data->id}}').submit();
          }
          else{
            event.preventDefault();

          }

          ">Delete</a>


      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="{{url('student/create')}}" class="hrf">Add New Department</a>
@endsection
