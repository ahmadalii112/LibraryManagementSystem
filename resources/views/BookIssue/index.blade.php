@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">All Issued Books
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
                                <th scope="col">Status</th>
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
                                    @if($row->DateReturned ==null)
                                    <td><span class="badge badge-pill badge-danger">Pending</span></td>
                                    @else
                                    <td><span class="badge badge-pill badge-success">Returned</span></td>
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
