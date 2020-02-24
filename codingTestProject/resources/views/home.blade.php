@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div> -->
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
                  <th scope="col">Edit / Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $connect = new mysqli("localhost", "root", "Dlficiqlzbna82!", "Library");
                if($connect != null){
                 // echo "connected";
                }else {
                 // echo "failed to connect ";
                }
                $sqlQuery = "SELECT * FROM Books";
                $qry = $connect->query($sqlQuery);

                while($row = mysqli_fetch_array($qry)):;?>
                <tr>
                  <td><?php echo $row[1];?></td>
                  <td><?php echo $row[2];?></td>
                  <td>

                  </td>
                </tr>
              <?php endwhile;?>
              </tbody>
            </table>
            <script>
              $(document).ready(function()){
                $('.delete_book').on('submit', function()){
                  alert('Clicked!');
                });
              });
            </script>
            </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
