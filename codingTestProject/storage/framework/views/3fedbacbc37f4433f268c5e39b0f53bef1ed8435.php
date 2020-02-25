<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <?php if(count($errors) > 0): ?>
              <div class="alert alert-danger">
                <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            <?php endif; ?>
            <?php if(\Session::has('success')): ?>
              <div class="alert alert-success">
                <p><?php echo e(\Session::get('success')); ?></p>
              </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-header">
                <div class="formContainer">
                  <form method="post" action="<?php echo e(url('book')); ?>">
                    <?php echo e(csrf_field()); ?>

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
              <a href="<?php echo e(action('BookController@export')); ?>" class="btn btn-success">Export to Excel</a>
            </div>
            <br />
            <div align="center">
              <a href="<?php echo e(action('BookController@exportcsv')); ?>" class="btn btn-success">Export to CSV</a>
            </div>
            <br />
            <div>
              <table class="table">
              <thead>
                <tr>
                  <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title'));?></th>
                  <th scope="col"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('author'));?></th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row['title']); ?></td>
                  <td><?php echo e($row['author']); ?></td>

                  <td><a class="btn btn-warning" href="<?php echo e(action('BookController@edit',$row['id'])); ?>" >Edit</a></td>
                  <td>
                    <form method="post" class="delete_form" action="<?php echo e(action('BookController@destroy', $row['id'])); ?>">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE"/>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      url:"<?php echo e(route('book.action')); ?>",
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/samdavey/Documents/samodavey.github.io/codingTestProject/resources/views/book/home.blade.php ENDPATH**/ ?>