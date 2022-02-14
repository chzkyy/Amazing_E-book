@extends('layouts.app')

@section('content')
<div class="container mt-5 table-data">
    <table class="table table-bordered">
      <tr class="table-title text-center">
        <td>Author</td>
        <td>Title</td>
      </tr>
      @foreach($ebooks as $book)
      <tr>
        <td class="w-25">
            {{$book->author}}
        </td>
        <td>
            <a href="{{ route('book.detail',[$book->id]) }}}">{{ $book->title }}</a>
        </td>
      </tr>
        @endforeach
    </table>
  </div>
@endsection