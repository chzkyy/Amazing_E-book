@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('GET')
        <div class="container my-5 col-md-12 row">
            <div class="col-md-4">
                <img src="{{asset('/img/'.$user->picture)}}" alt="" style="width: 200px;height: 200px;">
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="first_name">First name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}">
                </div>
    
                <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}">
                </div>

                <div class="form-group d-flex my-4 py-2">
                    <label for="gender_id">Gender</label>
                    @foreach($gender as $item)
                    <div class="ml-4 form-group form-check">
                        <input type="radio"name="gender_id" class="form-check-input" value="{{ $item->id }}" id='' @if(old('gender')) checked @endif required>
                        <label class="form-check-label" for="gender_id">{{$item->gender_desc}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                </div>
            </div>
    
            <div class="col-md-4">
                <div class="form-group">
                    <label for="middle_name">Middle name</label>
                    <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="role_id">Role</label>
                    <select name="role_id" id="" class="form-control">
                        @foreach($role as $item)
                            <option class="form-check-input" value="{{$item->id}}">{{$item->role_desc}}</option>
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
                    <button class="container font-weight-bold btn bg-yellow w-25">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection