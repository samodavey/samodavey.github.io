@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if(\Session::has('success'))
              <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
              </div>
            @endif
            <div class="card">
              <div class="card-header">
                <div class="formContainer">
                  <form method="post" action="{{url('book')}}">
                    {{csrf_field()}}
                    <div class="form-group formField">
                      <label for="inputTitle">Title</label>
                      <input type="text" class="form-control" name="title">
                      <small class="form-text text-muted">Please add the title of the book</small>
                    </div>
                    <div class="form-group formField">
                      <label for="inputAuthor">Author</label>
                      <input type="text" class="form-control" name="author">
                      <small class="form-text text-muted">Please add the author of the book</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
              </div>
              </div>

          <div class="card-body">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search Book Data"/>
            <br />
            <div align="center">
              <a href="{{action('BookController@export')}}" class="btn btn-success">Export to Excel</a>
            </div>
            <br />
            <div align="center">
              <a href="{{action('BookController@exportcsv')}}" class="btn btn-success">Export to CSV</a>
            </div>
            <br />
            <div>
              <table class="table">
              <thead>
                <tr>
                  <th scope="col">@sortablelink('title')</th>
                  <th scope="col">@sortablelink('author')</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($books as $row)
                <tr>
                  <td>{{$row['title']}}</td>
                  <td>{{$row['author']}}</td>

                  <td><a class="btn btn-warning" href="{{action('BookController@edit',$row['id'])}}" >Edit</a></td>
                  <td>
                    <form method="post" class="delete_form" action="{{action('BookController@destroy', $row['id'])}}">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE"/>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>

          </div>
            </div>

        </div>
    </div>
</div>
<script type="application/javascript">
$(document).ready(function(){
  $('.delete_form').on('submit',function(){
    if(confirm("Are you sure you wish to delete this book?")){
      return true;
    }else{
      return false;
    }
  });

  //fetch_book_data();

  function fetch_book_data(query = ''){
    $.ajax({
      url:"{{route('book.action')}}",
      method:'GET',
      data:{query:query},
      dataType:'json',
      success:function(data){
        $('tbody').html(data.table_data);
      }
    });

  }

  $(document).on('keyup','#search', function(){
    var query = $(this).val();
    fetch_book_data(query);
  });


});
</script>

@endsection
