@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Book Table
                        <a class=" btn-sm btn btn-outline-dark float-right" href="{{route('home')}}">Back</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{route('books.create')}}" class="btn btn-sm btn-success mr-1 float-right">Add Book</a>
                        @endif
                    </div>
                    @if($books->count()>0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Book Description</th>
                                <th scope="col">Book Price</th>
                                <th scope="col">Book Qunatity</th>
                                <th scope="col">Author</th>
                                @if(auth()->user()->isAdmin())
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $row)

                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->book_title}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($row->book_description,35)}}</td>
                                    <td>{{$row->book_price}}</td>
                                    <td>{{$row->book_quantity}}</td>
                                    <td>{{$row->author->author_name}}</td>
                                    @if(auth()->user()->isAdmin())
                                        <td>
                                            <form method="post" action="{{route('books.destroy',$row->id)}}">
                                                <a class="btn btn-sm btn-outline-primary"
                                                   href="{{route('books.edit',$row->id)}}">Edit</a>
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" name="Delete"
                                                        class="btn btn-sm btn-outline-danger mt-1"
                                                        onclick="return confirm('Are You Sure to Delete?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 style="margin: 50px auto ;text-align: center">No Records Available Yet</h3>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
