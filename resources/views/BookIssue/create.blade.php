@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Book Issue') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('issue.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Author') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="author_id" id="author_id">
                                        <option disabled selected>Select...</option>
                                        @foreach($author as $row)
                                            <option value="{{$row->id}}">{{$row->author_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Book Title') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="book_id" id="book_id">
                                        <option disabled selected>Select...</option>

                                    </select>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="book_issue_date"
                                       class="col-md-4 col-form-label text-md-right">Book Issue Date</label>


                                <div class="col-md-6">
                                    <input id="book_issue_date" type="text"
                                           class="form-control @error('book_issue_date') is-invalid @enderror" name="book_issue_date" value="" required autocomplete="book_issue_date" autofocus>
                                    @error('book_issue_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="book_return_date"
                                       class="col-md-4 col-form-label text-md-right">Book Return Date</label>


                                <div class="col-md-6">
                                    <input id="book_return_date" type="text"
                                           class="form-control @error('book_return_date') is-invalid @enderror" name="book_return_date" value="" required autocomplete="book_return_date" autofocus>
                                    @error('book_return_date')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>






                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!--Date FlatPicker -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#book_issue_date', {
            // enableTime: true
        })
    </script>
    <script>
        flatpickr('#book_return_date', {
            // enableTime: true
        })
    </script>




    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="author_id"]').on('change', function () {
                var author_id = $(this).val();
                // alert(author_id)
                if (author_id) {
                    $.ajax({
                        url: "{{  url('/get/book/') }}/" + author_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $("#book_id").empty();
                            $.each(data, function (key, value) {
                                $("#book_id").append('<option value="' + value.id + '">' + value.book_title + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection



@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection