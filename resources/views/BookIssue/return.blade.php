@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">All Issued Books by <br>
                        <b>{{\Illuminate\Support\Facades\Auth::user()->name}}
                        </b>
                        <br>
                        <a class="float-right btn btn-sm btn-outline-dark" href="{{route('home')}}">Back</a>
                    </div>
                    @if($data->count()>0)
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">User Address</th>
                                <th scope="col">Book Title</th>
                                <th scope="col">Book Price</th>
                                <th scope="col">Author</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Status / Action</th>
                                <th scope="col">Fine</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $row)

                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->book_title}}</td>
                                    <td>{{$row->book_price}}</td>
                                    <td>{{$row->author_name}}</td>
                                    <td>{{$row->book_issue_date}}</td>
                                    <td>{{$row->book_return_date}}</td>
                                    <td>
                                        @if($row->DateReturned==null)
                                            <a href="{{route('show.book',$row->book_id)}}">Click</a>
                                        @else
                                            @if($row->book_return_date < $row->DateReturned)
                                                <span class="badge badge-pill badge-danger">Late Return</span>
                                            @else
                                                <span class="badge badge-pill badge-success">Returned</span>
                                            @endif

                                        @endif
                                    </td>
                                    <td> @if($row->book_return_date < $row->DateReturned)
                                        @if($data = (strtotime($row->DateReturned) - strtotime($row->book_return_date)))
                                            @php
                                                $fine = $data/(60*60*24);
                                            @endphp
                                            PKR {{$fine*5}}
                                        @endif
                                        @else
                                            @if($row->DateReturned==null)
                                            @else
                                                No Fine
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <h3 style="margin: 50px auto ;text-align: center">You Have Nothing to Return</h3>

                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
