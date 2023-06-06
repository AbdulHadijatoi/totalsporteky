

<?php $__env->startSection('title', 'Basic Inputs - Forms'); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Add /</span> Leagues
</h4>

<div class="row">
  
<form action="<?php echo e(route('save-leagues')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Leagues</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name of League</label>
          <div class="col-md-10">
            <input class="form-control" type="text" required name="name" value="" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Location</label>
          <div class="col-md-10">
            <input class="form-control" type="text" required name="location" value="" id="html5-text-input" />
          </div>
        </div>
        
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
          <div class="col-md-10">
            <input class="form-control" type="date" required name="date_of_match" value="2021-06-18" id="html5-date-input" />
          </div>
        </div>
  
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
          <div class="col-md-10">
            <input class="form-control" type="time" required name="start_time" value="12:30:00" id="html5-time-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Upload Picture</label>
          <div class="col-md-10">
            <input class="form-control" type="file" required name="image"  />
          </div>
        </div>
        <button type="submit" class="btn btn-primary">ADD</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/hadi/Downloads/public_html/resources/views/content/form-elements/forms-basic-inputs.blade.php ENDPATH**/ ?>