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
            <div>
              <table class="table">
              <thead>
                <tr>
                  <th scope="col">Title</th>
                  <th scope="col">Author</th>
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
                  <td></td>
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

@endsection
