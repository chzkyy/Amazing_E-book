@extends('layouts.app')

@section('content')
<div class="container">
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

    <div class="mt-4 h3">
        {{$user->first_name}}
        {{$user->middle_name}}
        {{$user->last_name}}
    </div>

    <form action="{{ route('update.role',[$user->id]) }}" method="POST">
        @csrf
        <label for="role_id">Role :</label>
        <select name="role_id" id="">
            @foreach($role as $item)
                <option value="{{ $item->id }}">{{ $item->role_desc }}</option>
            @endforeach
        </select>
        <button class="btn btn bg-yellow font-weight-bold text-dark">Save</button>
    </form>
</div>
@endsection