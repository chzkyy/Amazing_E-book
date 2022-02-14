@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('login')}}" method="post">
        @csrf
        <h3 class="mt-4 text-underline col-md-3 detail mb-4">Login</h3>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="col-md-5">
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="container text-center">
                <div class="mt-4 mb-3 justify-content-center d-flex">
                    <button class="container font-weight-bold btn bg-yellow w-50">Submit</button>
                </div>
                <a class="text-center justify-content-center" href="{{route('get.register')}}">Don&#39;t have an account? click here to sign up</a>
            </div>
        </div>
    </form>
</div>
@endsection