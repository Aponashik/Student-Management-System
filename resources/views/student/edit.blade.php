@extends('layouts.app')
@section('title','Students')

@section('content')
<div class="container">
    
            <div class="card">
                <div class="card-header">Update Student</div>
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                    
                <div class="card-body">
                    <form method="POST" action="{{url('student/update',$data->id)}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                             <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="name" value="{{ $data->name }}" >

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="phone_number" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $data->phone_number }}" >

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $data->email }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="roll" class="col-md-4 col-form-label text-md-right">Roll</label>

                            <div class="col-md-6">
                                <input id="roll" type="roll" class="form-control{{ $errors->has('roll') ? ' is-invalid' : '' }}" name="title" value="{{ $data->roll }}" >

                                @if ($errors->has('roll'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('roll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reg_id" class="col-md-4 col-form-label text-md-right">Reg Id</label>

                            <div class="col-md-6">
                                <input id="reg_id" type="reg_id" class="form-control{{ $errors->has('reg_id') ? ' is-invalid' : '' }}" name="reg_id" value="{{$data->reg_id }}" >

                                @if ($errors->has('reg_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reg_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department_id" class="col-md-4 col-form-label text-md-right">Department</label>

                            <div class="col-md-6">    
                            <select class="form-control{{ $errors->has('department_id') ? 
                                'is-invalid' : '' }}"name="department_id" value="{{$data->department_id }}"
                                required>

                                <option>Select Department</option>
                                    @foreach($departments as $department)
                                            <option value="{{$department->id}}"{{ $data->department_id==$department->id?'selected':''}}>{{$department->title}}</option>
                                    @endforeach
                            </select>
                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="classes_id" class="col-md-4 col-form-label text-md-right">Class</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('classes_id') ? 
                                'is-invalid' : '' }}" name="classes_id"value="{{$data->classes_id }}" required>

                                <option>Select Class</option>
                                    @foreach($classes as $cl)
                                            <option value="{{$cl->id}}" {{ $data->classes_id==$cl->id?'selected':''}}>{{$cl->title}}</option>
                                    @endforeach
                            </select>

                                @if ($errors->has('classes_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('classes_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $data->address }}" >

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="father_name" class="col-md-4 col-form-label text-md-right">Father Name</label>

                            <div class="col-md-6">
                                <input id="father_name" type="text" class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}" name="father_name" value="{{ $data->father_name }}" >

                                @if ($errors->has('father_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('father_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mother_name" class="col-md-4 col-form-label text-md-right">Mother Name</label>

                            <div class="col-md-6">
                                <input id="mother_name" type="text" class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}" name="mother_name" value="{{ $data->mother_name }}" >

                                @if ($errors->has('mother_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mother_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
