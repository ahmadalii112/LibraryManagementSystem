@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">{{$data[0]->shelves_name?? 'Shelve A'}}
                        <a class=" btn-sm btn btn-outline-dark float-right" href="{{route('home')}}">Back</a>
                    </div>
                    @if($data->count()>= 1)
                    <div class="container">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Shelve Row</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Book Price</th>
{{--                                <th scope="col">Author Name</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                            <tr>
                                <th scope="row">{{$row->row}}</th>
                                <td><a href="{{route('books.index')}}">{{$row->book_title}}</a></td>
                                <td>{{$row->book_price}}</td>
{{--                                <td>{{$row->book->author_name}}</td>--}}
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <h1 class="text-center">No Books On Shelve</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
