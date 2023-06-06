

<?php $__env->startSection('title', 'Tables - Basic Tables'); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  leagues
</h4>



<!-- Bootstrap Table with Header - Light -->
<div class="card">
  <h5 class="card-header">List of leagues</h5>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>League Name</th>
          <th>Home team</th>
          <th>Away Team</th>
          <th>Time</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($key +1); ?></td>
          <td><?php echo e($item->league->name); ?></td>
          <td><?php echo e($item->home_team); ?>

          </td>
          <td><?php echo e($item->away_team); ?></td>
          <td><?php echo e($item->start_time); ?></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="ti ti-dots-vertical"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo e(route('edit-match', $item->id)); ?>"><i class="ti ti-pencil me-1"></i> Edit</a>
                <a class="dropdown-item" href="<?php echo e(route('delete-match', $item->id)); ?>"><i class="ti ti-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
<hr class="my-5">
<!--/ Responsive Table -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/content/tables/match-index.blade.php ENDPATH**/ ?>