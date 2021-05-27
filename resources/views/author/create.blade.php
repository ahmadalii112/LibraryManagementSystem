@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Author</div>
                    <!-- Form Starts -->
                    <div class="container align-items-center w-75 mt-2 mb-3">

                        <form action="{{route('author.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="book_title">Author Name</label>
                                <input type="text" class="form-control" name="author_name" value="{{old('book_title')}}"
                                       id="author_name" aria-describedby="author_name" placeholder="Author Name">
                                @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author_address">Author Address</label>
                                <input type="text" class="form-control" name="author_address" value="{{old('author_address')}}"
                                       id="author_address" aria-describedby="author_address" placeholder="Author Address">
                            </div>
                            <div class="form-group">
                                <label for="author_phone">Author Phone</label>
                                <input type="text" class="form-control" name="author_phone" value="{{old('author_phone')}}"
                                       id="author_phone" aria-describedby="author_phone" placeholder="Author Phone">
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
