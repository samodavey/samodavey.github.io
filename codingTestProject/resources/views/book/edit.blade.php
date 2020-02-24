@extends('layouts.app')

@section('content')

<!-- Edit Modal -->
<div>
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Change Author</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
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
      <form method="post" action="{{action('BookController@update', $id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH"/>

        <div class="form-group formField">
          <label for="inputAuthor">Author</label>
          <input type="text" class="form-control" name="author" value="{{$book->author}}">
          <small class="form-text text-muted">Please update the author of the book</small>
        </div>

        <div class="modal-footer form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" value="Edit">Save changes</button>
        </div>

      </form>
    </div>
  </div>
</div>
</div>
@endsection
