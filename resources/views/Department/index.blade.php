@extends('layouts.app')
@section('title','Departments')

@section('content')
<h3 align="center">Department List</h3>
 @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($departments as $department)
    <tr>
      <th scope="row">{{$department->id}}</th>
      <td>{{$department->title}}</td>
      
      <td><a href="{{url('departments/edit',$department->id)}}" class="hrf">Edit</a> || 
        <form id="delete-form-{{$department->id}}" method="post" action="{{url('departments/delete',$department->id)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}  
          </form>

          <a href="" onclick="
          if(confirm('Are Yiu sure to delete this?'))
          {
            event.preventDefault();
            document.getElementById('delete-form-{{$department->id}}').submit();
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
<a href="{{url('departments/create')}}" class="hrf">Add New Department</a>
@endsection
