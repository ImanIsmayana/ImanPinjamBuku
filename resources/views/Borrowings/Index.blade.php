@extends('layouts.app')

@section('content')
    <script>
        $( document ).ready(function() {
            // loading overlay
            $("#loadingoverlay_borrowing").LoadingOverlay("show");
            setTimeout(function(){
                $("#loadingoverlay_borrowing").LoadingOverlay("hide");
            }, 5000);

            $("#loadingoverlay_borrower").LoadingOverlay("show");
            setTimeout(function(){
                $("#loadingoverlay_borrower").LoadingOverlay("hide");
            }, 10000);

            $("#loadingoverlay_latecharge").LoadingOverlay("show");
            setTimeout(function(){
                $("#loadingoverlay_latecharge").LoadingOverlay("hide");
            }, 10000);
            
            // create borrowing book
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

            }, 4000);

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

            if($("#memberlist").val() == null){
                $("#newmember").show();
                $("#memberlist").hide();
            }else{
                $("#newmember").hide();
                $("#memberlist").show();
            }

            if($("#booklist").val() == null){
                $("#newbook").show();
                $("#booklist").hide();
            }else{
                $("#newbook").hide();
                $("#booklist").show();
            }

            // datatable
            setTimeout(function(){
                var a = $('#datatable_borrowing').DataTable({
                    "paging": false,
                    "info": false
                });
            }, 5000);

            setTimeout(function(){
                var aa = $('#datatable_borrower').DataTable({
                    "paging": false,
                    "info": false
                });
            }, 10000);

            setTimeout(function(){
                var aaa = $('#datatable_latecharge').DataTable({
                    "paging": false,
                    "info": false
                });
            }, 10000);

            // a.search(this.value).draw();
            // a.fnFilter(this.value);


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
                                <a class="nav-link" href="{{ route('members.index') }}">Member List</a>
                            </li>
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
                <h2>Borrower list</h2>
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
        <form action="{{ route('borrowings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input type="hidden" name="status" value="1">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Member:</strong>
                        <p id="newmember"><a class="nav-link" href="{{ route('members.index') }}">create new Member.</a></p>
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
                        <p id="newbook"><a class="nav-link" href="{{ route('books.index') }}">add new Book.</a></p>
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
                        <input type="text" name="created_at_borrow" id="borrowdate" class="form-control" placeholder="Select date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Return Date:</strong>
                        <input type="text" name="return_date" id="returndate" class="form-control" placeholder="Select date">
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

    <div id="return" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Danger</h5>
                </div>
                <div class="modal-body">
                    <p>some have entered the period for borrowing books, take a look now !!!</p>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div id="loadingoverlay_borrowing">
        <table id="datatable_borrowing" class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Book Name</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($borrowings as $borrowing)
                    <script>
                        // ajax get membername
                        var b = "";
                        var k = "";
                        var r = "";

                        function getmember() {
                            $.ajax({
                                url: "/borrowings/membername/"+{{ $borrowing->member_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        b = obj.name;
                                    });

                                    document.getElementById("" +{{ $borrowing->member_id }}+{{ $i }}+"").innerHTML = "<td>"+ b +"</td>";

                                    return b;
                                }
                            });
                        }

                        function getbook() {
                            $.ajax({
                                url: "/borrowings/bookname/"+{{ $borrowing->book_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        k = obj.title;
                                    });

                                    document.getElementById("" +{{ $borrowing->book_id }}+{{ $i }}+"").innerHTML = "<td>"+ k +"</td>";

                                    return k;
                                }
                            });
                        }

                        function returndate() {
                            $.ajax({
                                url: "/borrowings/returndate/"+{{ $borrowing->id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        r = obj.return_date;
                                    });

                                    console.log("tanggal: " +r);

                                    return r;
                                }
                            });
                        }

                        var borrowingidstatus = "";
                        var borrowingidstatuslate = "";

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        function createNewBookStatus(borrowingidstatus) {
                            $.ajax({
                                async: false,
                                url: "/borrowings/storeBorrowingStatus/"+borrowingidstatus,
                                //data: "{ 'bookid': '" + JSON.stringify(book) + "' }",
                                dataType: "json",
                                type: "PUT",
                                contentType: "application/json; charset=utf-8",
                                dataFilter: function (data) { return data; },
                                success: function (data) {

                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {

                                }
                            });
                        }

                        function createNewBookStatusLate(borrowingidstatuslate) {
                            $.ajax({
                                async: false,
                                url: "/borrowings/storeBorrowingStatusLate/"+borrowingidstatuslate,
                                //data: "{ 'bookid': '" + JSON.stringify(book) + "' }",
                                dataType: "json",
                                type: "PUT",
                                contentType: "application/json; charset=utf-8",
                                dataFilter: function (data) { return data; },
                                success: function (data) {

                                },
                                error: function (XMLHttpRequest, textStatus, errorThrown) {

                                }
                            });
                        }

                        getbook();
                        getmember();
                        returndate();

                        $("#return").hide();

                        function refreshPage(){
                            window.location.reload();
                        } 

                        setTimeout(function(){
                            var d = new Date();
                            var month = d.getMonth()+1;
                            var day = d.getDate();

                            var output = d.getFullYear() + '-' +
                                (month<10 ? '0' : '') + month + '-' +
                                (day<10 ? '0' : '') + day;

                            var returnNow = r.includes(output);

                            if(returnNow == true){
                                $("#return").show();
                            }

                        }, 8000);

                        setTimeout(function(){
                            var d = new Date();
                            var month = d.getMonth()+1;
                            var day = d.getDate();

                            var output = d.getFullYear() + '-' +
                                (month<10 ? '0' : '') + month + '-' +
                                (day<10 ? '0' : '') + day;

                            var returnNow = r.includes(output);

                            if(returnNow == true){
                                $("#return").hide();
                            }

                        }, 12000);

                    </script>
                    <tr id="iman">
                        <td id="{{ $borrowing->member_id }}{{ $i }}"></td>
                        <td id="{{ $borrowing->book_id }}{{ $i }}"></td>
                        <td>{{ $borrowing->created_at_borrow }}</td>
                        <td id="return_date">{{ $borrowing->return_date }}</td>
                        <td>
                            <form action="{{ route('borrowings.destroy',$borrowing->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('borrowings.edit',$borrowing->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete this?');">Delete</button>
                            </form>
                        </td>
                        <td>
                            <button type="submit" style="margin: 4px 4px 4px 4px" class="btn btn-warning" onclick="createNewBookStatusLate({{ $borrowing->id }}); refreshPage();">Late</button>
                            <button type="submit" class="btn btn-success" id="statusdone" onclick="createNewBookStatus({{ $borrowing->id }}); refreshPage();">Done</button>
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
    </div>
    <br>
    <br>
    <br>
    <hr>
    <h1>finished borrowing list</h1>
    <br>
    <div id="loadingoverlay_borrower">
        <table id="datatable_borrower" class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Book Name</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($allborrowers as $allborrower)
                    <script>
                        // ajax get membername
                        var b = "";
                        var k = "";
                        var r = "";

                        function getmember() {
                            $.ajax({
                                url: "/borrowings/membername/"+{{ $allborrower->member_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        b = obj.name;
                                    });

                                    document.getElementById("" +{{ $allborrower->member_id }}+{{ $i }}+"").innerHTML = "<td>"+ b +"</td>";

                                    return b;
                                }
                            });
                        }

                        function getbook() {
                            $.ajax({
                                url: "/borrowings/bookname/"+{{ $allborrower->book_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        k = obj.title;
                                    });

                                    document.getElementById("" +{{ $allborrower->book_id }}+{{ $i }}+"").innerHTML = "<td>"+ k +"</td>";

                                    return k;
                                }
                            });
                        }

                        getbook();
                        getmember();

                    </script>

                    <tr id="iman">
                        <td id="{{ $allborrower->member_id }}{{ $i }}"></td>
                        <td id="{{ $allborrower->book_id }}{{ $i }}"></td>
                        <td>{{ $allborrower->created_at_borrow }}</td>
                        <td>{{ $allborrower->return_date }}</td>
                        <td>
                            <form action="{{ route('borrowings.destroy',$allborrower->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure to delete this?');">Delete</button>
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
    </div>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <h1>Late charge list</h1>
    <br>
    <div id="loadingoverlay_latecharge">
        <table id="datatable_latecharge" class="table table-bordered table-responsive-lg">
            <thead>
                <tr>
                    <th>Member Name</th>
                    <th>Book Name</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($latecharges as $latecharges)
                    <script>
                        // ajax get membername
                        var b = "";
                        var k = "";
                        var r = "";

                        function getmember() {
                            $.ajax({
                                url: "/borrowings/membername/"+{{ $latecharges->member_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        b = obj.name;
                                    });

                                    document.getElementById("" +{{ $latecharges->member_id }}+{{ $i }}+"").innerHTML = "<td>"+ b +"</td>";

                                    return b;
                                }
                            });
                        }

                        function getbook() {
                            $.ajax({
                                url: "/borrowings/bookname/"+{{ $latecharges->book_id }},
                                dataType: "json",
                                type: "GET",
                                contentType: "application/json; charset=utf-8",
                                success: function (data) {

                                    $.each(data,function(index,obj)
                                    {
                                        k = obj.title;
                                    });

                                    document.getElementById("" +{{ $latecharges->book_id }}+{{ $i }}+"").innerHTML = "<td>"+ k +"</td>";

                                    return k;
                                }
                            });
                        }

                        getbook();
                        getmember();

                    </script>

                    <tr id="iman">
                        <td id="{{ $latecharges->member_id }}{{ $i }}"></td>
                        <td id="{{ $latecharges->book_id }}{{ $i }}"></td>
                        <td>{{ $latecharges->created_at_borrow }}</td>
                        <td>{{ $latecharges->return_date }}</td>
                        <td>
                            <form action="{{ route('borrowings.destroy',$latecharges->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="margin: 4px 4px 4px 4px" class="btn btn-danger" onclick="return confirm('are you sure to delete this?');">Delete</button>
                                <button type="submit" class="btn btn-success" onclick="createNewBookStatus({{ $borrowing->id }}); refreshPage();">Done</button>
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
    </div>
    <br>
    <br>
    <br>
    <br>

    {!! $borrowings->links() !!}

@endsection
