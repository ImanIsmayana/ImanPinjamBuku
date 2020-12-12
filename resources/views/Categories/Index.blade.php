@extends('layouts.app')

@section('content')
    <script>
        $( document ).ready(function() {

            $("#closenewcategory").hide();
            $(".newcategory").hide();

            $( "#shownewcategory" ).click(function() {
                $(".newcategory").show();
                $("#closenewcategory").show();
                $("#shownewcategory").hide();
            });
            $( "#closenewcategory" ).click(function() {
                  $(".newcategory").hide();
                  $("#shownewcategory").show();
                  $("#closenewcategory").hide();
            });

            setTimeout(function(){

                $("#close").hide();

            }, 3000);

            var a = $('#datatable_category').DataTable();

            a.search(this.value).draw();

        });
    </script>

    <div class="pos-f-t mt-10">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-secondary p-4">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.index') }}">Book List</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <a class="nav-link" href="/">Its Me <span class="sr-only">(current)</span></a>
                        </span>
                    </div>
                </nav>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-secondary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Book Category list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#" id="shownewcategory" ><i class="fas fa-plus-circle"></i></a>
                <a class="btn btn-danger" href="#" id="closenewcategory" ><i class="fas fa-times-circle"></i></i></a>
            </div>
        </div>
    </div>
    <div class="newcategory">
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
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">here !!</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success" id="close">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table id="datatable_category" class="table table-bordered table-responsive-lg">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('categories.edit',$category->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete category {{ $category->name }}?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>

    {!! $categories->links() !!}

@endsection
