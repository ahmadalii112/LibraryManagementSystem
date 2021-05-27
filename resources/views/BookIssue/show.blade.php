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


                    <div class="container mt-3">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail4">User Name</label>
                                <br>
                                <strong>{{$data->name}}</strong>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Address</label>
                                <br>
                                <strong>{{$data->address}}</strong>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Phone</label>
                                <br>
                                <strong>{{$data->phone}}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Book Title</label>
                                <br>
                                <strong>{{$data->book_title}}</strong>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Book Price</label>
                                <br>
                                <strong>{{$data->book_price}}</strong>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Book Author</label>
                                <br>
                                <strong>{{$data->author_name}}</strong>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Issue Date</label>
                                <br>
                                <strong>{{$data->book_issue_date}}</strong>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputPassword4">Return Date</label>
                                <br>
                                <strong>{{$data->book_return_date}}</strong>
                            </div>


                        </div>

                        <hr>

                        <div class="form-row mb-3 float-right">

                            {{--                            @if($data->DateReturned==null)--}}
                            <form action="{{route('issue.fine',$data->book_id)}}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="DateReturned"
                                       value="{{\Carbon\Carbon::parse()->format('Y-m-d')}}">


                                <button class="btn btn-success" type="submit">
                                    Click Here to Return You Book
                                </button>
                            </form>

                            {{--                            @endif--}}

                        </div>


                    </div>


                </div>


                {{--                    <table class="table table-hover">--}}
                {{--                        <thead>--}}
                {{--                        <tr>--}}
                {{--                            <th scope="col">Id</th>--}}
                {{--                            <th scope="col">User Name</th>--}}
                {{--                            <th scope="col">User Phone</th>--}}
                {{--                            <th scope="col">User Address</th>--}}
                {{--                            <th scope="col">Book Title</th>--}}
                {{--                            <th scope="col">Book Price</th>--}}
                {{--                            <th scope="col">Author</th>--}}
                {{--                            <th scope="col">Issue Date</th>--}}
                {{--                            <th scope="col">Return Date</th>--}}
                {{--                            <th scope="col">Status / Action </th>--}}
                {{--                        </tr>--}}
                {{--                        </thead>--}}
                {{--                        <tbody>--}}
                {{--                        @foreach($data as $row)--}}
                {{--                            @if($row->DateReturned ==null)--}}
                {{--                                <tr>--}}
                {{--                                    <th scope="row">{{$row->id}}</th>--}}
                {{--                                    <td>{{$row->name}}</td>--}}
                {{--                                    <td>{{$row->phone}}</td>--}}
                {{--                                    <td>{{$row->address}}</td>--}}
                {{--                                    <td>{{$row->book_title}}</td>--}}
                {{--                                    <td>{{$row->book_price}}</td>--}}
                {{--                                    <td>{{$row->author_name}}</td>--}}
                {{--                                    <td>{{$row->book_issue_date}}</td>--}}
                {{--                                    <td>{{$row->book_return_date}}</td>--}}
                {{--                                    <td>--}}
                {{--                                        @if($row->DateReturned==null)--}}
                {{--                                            <form action="{{route('issue.fine',$row->book_id)}}" method="post">--}}
                {{--                                                @csrf--}}
                {{--                                                @method('put')--}}
                {{--                                                <input type="hidden" name="DateReturned"--}}
                {{--                                                       value="{{\Carbon\Carbon::parse()->format('Y-m-d')}}">--}}
                {{--                                                <button class="btn btn-outline-success" type="submit">Return--}}
                {{--                                                </button>--}}
                {{--                                            </form>--}}

                {{--                                        @endif--}}
                {{--                                    </td>--}}
                {{--                                </tr>--}}
                {{--                            @endif--}}
                {{--                        @endforeach--}}
                {{--                        </tbody>--}}
                {{--                    </table>--}}


            </div>
        </div>
    </div>
    </div>
@endsection
