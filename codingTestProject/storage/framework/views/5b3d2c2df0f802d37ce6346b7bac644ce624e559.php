<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <?php if($message = Session::get('success')): ?>
          <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
          </div>
          <?php endif; ?>
          <div align="right">
            <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Add</>
              <br />
              <br />
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/samdavey/Documents/samodavey.github.io/codingTestProject/resources/views/book/index.blade.php ENDPATH**/ ?>