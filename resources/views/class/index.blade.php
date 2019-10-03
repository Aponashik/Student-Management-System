@extends('layouts.app')
@section('title','Class')

@section('content')
<h3 align="center">Class List</h3>
 @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">Class</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $data)
    <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->title}}</td>
      
      <td><a href="{{url('class/edit',$data->id)}}" class="hrf">Edit</a> || 
        <form id="delete-form-{{$data->id}}" method="post" action="{{url('class/delete',$data->id)}}">
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
<a href="{{url('class/create')}}" class="hrf">Add New Class</a>
@endsection
