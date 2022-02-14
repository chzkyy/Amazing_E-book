@extends('layouts.app')

@section('content')
<div class="container mt-5 table-data">
    <table class="table">
        @forelse ($order as $item)
        <thead class="table-borderless">
            <tr class="table-title text-center">
                <td class="col-md-10">Title</td>
            </tr>
        </thead>
        <tbody class="table-bordered border-dark">
            <tr>
                <td>
                    <a href="{{ route('book.detail', [$item->book->id]) }}">{{$item->Book->title}}</a>
                </td>
                <td>
                    <a href="{{ route('order.delete', [$item->id]) }}">Delete</a>
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-center font-weight-bold">No data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{route('order.submit')}}" class="btn btn bg-yellow font-weight-bold text-dark">Submit</a>
</div>
@endsection