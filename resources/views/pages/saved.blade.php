@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container text-center d-flex bulet align-items-center justify-content-center my-4">
        <div class="row">
            <span class="font-weight-bold h1">
                Success!
                <br>
                <a href="{{route('home')}}">Click here to "Home"!</a>
            </span>
        </div>
    </div>
</div>
@endsection