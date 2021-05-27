@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Welcome to Our Library</div>

                    <div class="card-body">

                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <a href="{{route('books.index')}}">Books</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('author.index')}}">Authors</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">SHELVES
                        @if(auth()->user()->isAdmin())

                            <a class=" btn-sm btn btn-outline-secondary float-right" href="{{route('shelves.books')}}">Shelves
                                you Books</a>
                        @endif
                    </div>

                    <div class="card-body">

                        <ul class="list-group text-center">
                            <li class="list-group-item">
                                <a href="{{route('shelves.a')}}">Shelve A</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('shelves.b')}}">Shelve B</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('shelves.c')}}">Shelve C</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Issue A Book?</div>

                    <div class="card-body">

                        <ul class="list-group text-center">
                            @if(auth()->user()->isAdmin())
                                <li class="list-group-item">
                                    <a href="{{route('issue.index')}}">Show all Issued Books</a>
                                </li>
                            @endif

                            <li class="list-group-item">
                                <a href="{{route('issue.create')}}">Issue your Book</a>
                            </li>
                            @if(auth()->user()->role == 'student')
                                <li class="list-group-item">
                                    <a href="{{route('issue.return')}}">Return your Book</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
