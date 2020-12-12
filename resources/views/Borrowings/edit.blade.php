@extends('layouts.app')

@section('content')
    <script>
        $( document ).ready(function() {

            $('#borrowdate').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                todayBtn: true,
                zIndexOffset: 100,
                clearBtn: true
            });

            $('#returndate').datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                todayBtn: true,
                clearBtn: true
            });

        });
    </script>
    <br>
    <br>
    <br>
    <div style="width:1150;height:600;background-color:#e6e6e6;padding:20px 20px 20px 20px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Borrower</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('borrowings.index') }}" title="Go back"> <i class="fas fa-backward "></i></a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> 
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('borrowings.update',$borrowing->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Member:</strong>
                        <select id="memberlist" name="member_id" class="form-control">
                            @foreach ($memberlist as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Book:</strong>
                        <select id="booklist" name="book_id" class="form-control">
                            @foreach ($booklist as $book)
                                <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Borrow Date:</strong>
                        <input type="text" name="created_at_borrow" value="{{ $borrowing->created_at_borrow }}" id="borrowdate" class="form-control" placeholder="Select date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Return Date:</strong>
                        <input type="text" name="return_date" value="{{ $borrowing->return_date }}" id="returndate" class="form-control" placeholder="Select date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
