@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Borrower</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('borrowings.index') }}" title="Go back"> <i class="fas fa-backward "></i></a>
            </div>
        </div>
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

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

    <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Borrow Date:</strong>
                    <input type="text" name="borrow_date" id="borrowdate" class="form-control" placeholder="Select date">
                    @error('title')
                        <div class="alert alert-danger mt-1 mb-1">here !!</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Return Date:</strong>
                    <input type="text" name="return_date" id="returndate" class="form-control" placeholder="Select date">
                    @error('author')
                        <div class="alert alert-danger mt-1 mb-1">here !!</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
