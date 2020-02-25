<?php $__env->startSection('content'); ?>

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
      <form method="post" action="<?php echo e(action('BookController@update', $id)); ?>">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_method" value="PATCH"/>

        <div class="form-group formField">
          <label for="inputAuthor">Author</label>
          <input type="text" class="form-control" name="author" value="<?php echo e($book->author); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/samdavey/Documents/samodavey.github.io/codingTestProject/resources/views/book/edit.blade.php ENDPATH**/ ?>