@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center my-3">Account Maintaince</h1>

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
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->first_name}}
                    {{$user->middle_name}}
                    {{$user->last_name}} - 
                    {{$user->Role->role_desc}}
                </td>
                <td>
                    <a href="{{ route('get.update.role',[$user->id]) }}">Update Role</a>
                    <a href="{{ route('delete.account',[$user->id]) }}">Delete Account</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection