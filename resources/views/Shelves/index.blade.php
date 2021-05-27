@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Book</div>
                    <!-- Form Starts -->
                    <div class="container align-items-center w-75 mt-2 mb-3">

                        <form action="{{route('shelves.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="book_title">Shelves</label>
                                <select class="form-control" name="shelve_id" id="">
                                    <option selected disabled>Choose...</option>
                                    @foreach($shelves as $row)
                                    <option value="{{$row->id}}">{{$row->shelves_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="book_title">Row</label>
                                <select class="form-control" name="row" id="">
                                    <option selected disabled>Choose...</option>
                                        <option value="1">Row 1</option>
                                        <option value="2">Row 2</option>
                                        <option value="3">Row 3</option>
                                        <option value="4">Row 4</option>
                                        <option value="5">Row 5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="book_title">Book</label>
                                <select class="form-control" name="book_id" id="">
                                    <option selected disabled>Choose...</option>
                                    @foreach($books as $row)
                                        <option value="{{$row->id}}">{{$row->book_title}}</option>
                                    @endforeach
                                </select>
                            </div>


                            {{--                            <div class="form-group">--}}
{{--                                <label for="book_price">Author Name</label>--}}
{{--                                <select class="form-control" name="author_id" id="">--}}
{{--                                    <option selected disabled>Choose...</option>--}}
{{--                                    @foreach($author as $row)--}}
{{--                                        <option value="{{$row->id}}">{{$row->author_name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
