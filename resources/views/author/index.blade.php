@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Author Table
                        <a class=" btn-sm btn btn-outline-dark float-right" href="{{route('home')}}">Back</a>
                         @if(auth()->user()->isAdmin())
                    <a  href="{{route('author.create')}}" class="btn btn-sm btn-success mr-1 float-right">Add Author</a>
                           @endif
                    </div>
                    <div class="container">
                        @if($author->count()>0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                @if(auth()->user()->isAdmin())
                                    <th scope="col">Action</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($author as $row)
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->author_name}}</td>
                                    <td>{{$row->author_address}}</td>
                                    <td>{{$row->author_phone}}</td>
                                    @if(auth()->user()->isAdmin())
                                        <td>
                                            <form method="post" action="{{route('author.destroy',$row->id)}}">
                                                <a class="btn btn-sm btn-outline-primary"
                                                   href="{{route('author.edit',$row->id)}}">Edit</a>
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
                            <h3 style="margin: 50px auto ;">No Records Available Yet</h3>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
