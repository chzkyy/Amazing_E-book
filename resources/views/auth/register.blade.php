@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h3 class="mt-4 text-underline col-md-3 detail mb-4">Sign Up</h3>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="container col-md-12 row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}">
                </div>
    
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
                </div>

                <div class="form-group d-flex my-4 py-2">
                    <label for="gender_id">Gender</label>
                    @foreach($gender as $g)
                    <div class="ml-4 form-group form-check">
                        <input type="radio"name="gender_id" class="form-check-input" value="{{ $g->id }}" id='' @if(old('gender')) checked @endif required>
                        <label class="form-check-label" for="gender_id">{{$g->gender_desc}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-group">
                    <label for="middle_name">Middle name</label>
                    <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="" class="form-control">
                        @foreach($role as $r)
                            <option class="form-check-input" value="{{$r->id}}">{{$r->role_desc}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="picture">Display Picture</label>
                    <input type="file" class="form-control form-control-file" name="picture" accept="image/*">
                </div>

            </div>

            <div class="container text-center">
                <div class="mt-4 mb-3 justify-content-center d-flex">
                    <button class="container font-weight-bold btn bg-yellow w-25">Submit</button>
                </div>
                <a class="text-center justify-content-center" href="{{route('get.login')}}">Already have an account? click here to log in</a>
            </div>
        </div>
    </form>
</div>
@endsection