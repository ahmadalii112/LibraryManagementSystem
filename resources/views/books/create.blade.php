@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Book</div>
                    <!-- Form Starts -->
                    <div class="container align-items-center w-75 mt-2 mb-3">

                        <form action="{{route('books.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="book_title">Book Title</label>
                                <input type="text" class="form-control" name="book_title" value="{{old('book_title')}}"
                                       id="book_title" aria-describedby="book_title" placeholder="Enter Book Title">
                            </div>

                            <div class="form-group">
                                <label for="book_description">Book Description</label>
                                <textarea class="form-control" name="book_description" id="book_description"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="book_price">Book Price</label>
                                <input type="number" class="form-control" name="book_price"
                                       value="{{old('book_price')}}" id="book_price" aria-describedby="book_price"
                                       placeholder="Enter Book Price">
                            </div>
                            <div class="form-group">
                                <label for="book_quantity">Book Price</label>
                                <input type="number" class="form-control" name="book_quantity"
                                       value="{{old('book_quantity')}}" id="book_quantity" aria-describedby="book_quantity"
                                       placeholder="Enter Book Quantity">
                            </div>

                            <div class="form-group">
                                <label for="book_price">Author Name</label>
                                <select class="form-control" name="author_id" id="">
                                    <option selected disabled>Choose...</option>
                                    @foreach($author as $row)
                                    <option value="{{$row->id}}">{{$row->author_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
