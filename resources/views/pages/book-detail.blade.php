@extends('layouts.app')

@section('content')
<div class="container mt-5 table-data">
    <h3 class="col-md-3 text-dark text-underline">Ebook Detail</h3>
    <table class="table table-borderless">
      <tr class="h6">
        <td>Title :</td>
        <td>{{$ebook->title}}</td>
      </tr>
      <tr class="h6">
          <td>Author :</td>
          <td>{{$ebook->author}}</td>
      </tr>
      <tr class="h6">
          <td>Description :</td>
          <td>{{$ebook->description}}</td>
      </tr>
    </table>
</div>
<div class="container">
    <a href="{{route('rent.book',[$ebook->id])}}" class="btn bg-yellow font-weight-bold text-dark mt-3">Rent</a>
</div>
@endsection