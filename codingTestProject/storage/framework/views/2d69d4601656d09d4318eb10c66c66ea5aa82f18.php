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
                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($row['title']); ?></td>
                  <td><?php echo e($row['author']); ?></td>
                  <td></td>
                  <td></td>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/samdavey/Documents/samodavey.github.io/codingTestProject/resources/views/home.blade.php ENDPATH**/ ?>