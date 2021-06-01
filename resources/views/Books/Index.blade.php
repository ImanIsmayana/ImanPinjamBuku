@extends('layouts.app')

@section('content')
    <script>
        $( document ).ready(function() {

            $("#closenewborrowing").hide();
            $(".newborrowing").hide();

            $( "#shownewborrowing" ).click(function() {
                $(".newborrowing").show();
                $("#closenewborrowing").show();
                $("#shownewborrowing").hide();
            });
            $( "#closenewborrowing" ).click(function() {
                  $(".newborrowing").hide();
                  $("#shownewborrowing").show();
                  $("#closenewborrowing").hide();
            });

            setTimeout(function(){

                $("#close").hide();

            }, 3000);

            setTimeout(function(){

                var aa = $("#book_id").val();
                var bb = parseInt(aa);
                var cc = bb+1;
                var dd = cc.toString();

                $("#book_id").val(dd);

            }, 2000);

            setTimeout(function(){
                var a = $('#datatable_book').DataTable({
                    "paging": false,
                    "info": false
                });
            }, 10000);

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
                                <a class="nav-link" href="{{ route('borrowings.index') }}">Borrow Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('categories.index') }}">Categories Book</a>
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
                <h2>Book list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="#" id="shownewborrowing" ><i class="fas fa-plus-circle"></i></a>
                <a class="btn btn-danger" href="#" id="closenewborrowing" ><i class="fas fa-times-circle"></i></i></a>
            </div>
        </div>
    </div>

    <div class="newborrowing">
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
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Book Code:</strong>
                        <input type="number" name="id" id="book_id" class="form-control" value="{{ $last_bookcode->id }}" readonly>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger mt-1 mb-1">here !!</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author:</strong>
                        <input type="text" name="author" class="form-control" placeholder="Author">
                        @error('author')
                            <div class="alert alert-danger mt-1 mb-1">here !!</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Publisher:</strong>
                        <input type="text" name="publisher" class="form-control" placeholder="Publisher">
                        @error('publisher')
                            <div class="alert alert-danger mt-1 mb-1">here !!</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Categories:</strong>
                        <select id="categorylist" name="category[]" class="form-control" multiple>
                            @foreach ($categorylist as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
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

    <table id="datatable_book" class="table table-bordered table-responsive-lg">
        <thead>
            <tr>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($books as $book)
                <script>
                    var cat = "";
                    function categorybook() {
                        $.ajax({
                            url: "/borrowings/bookcategory/"+{{ $book->id }},
                            dataType: "json",
                            type: "GET",
                            contentType: "application/json; charset=utf-8",
                            success: function (data) {

                                $.each(data,function(index,obj)
                                {
                                    r = obj.name;
                                });


                                document.getElementById("" +{{ $book->id }}+{{ $i }}+"").innerHTML = "<td>"+ r +"</td>";

                                console.log(r);

                                return cat;
                            }
                        });
                    }

                    categorybook();
                </script>
                <tr id="ismayana">
                    <td id="{{ $book->id }}{{ $i }}"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publisher }}</td>
                    <td>
                        <form action="{{ route('books.destroy',$book->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete {{ $book->title }}?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $i = $i+1;
                @endphp
            @endforeach
            @php
                $i++
            @endphp
        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>

    {!! $books->links() !!}

@endsection
