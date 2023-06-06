

<?php $__env->startSection('title', 'Basic Inputs - Forms'); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> Leagues
</h4>

<div class="row">
  
<form action="<?php echo e(route('update-leagues')); ?>" method="POST" enctype="multipart/form-data">
  <?php echo csrf_field(); ?>
  <div class="col-xl-8">
    <!-- HTML5 Inputs -->
    <div class="card mb-4">
      <h5 class="card-header">Leagues</h5>
      <div class="card-body">
        <div class="mb-3 row">
          <input type="hidden" name="id" value="<?php echo e($findleagues->id); ?>">
          <label for="html5-text-input" class="col-md-2 col-form-label">Name of League</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="name" value="<?php echo e($findleagues->name); ?>" id="html5-text-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Location</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="location" value="<?php echo e($findleagues->location); ?>" id="html5-text-input" />
          </div>
        </div>
        
        <div class="mb-3 row">
          <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
          <div class="col-md-10">
            <input class="form-control" type="date" name="date_of_match" value="<?php echo e($findleagues->date_of_match); ?>" id="html5-date-input" />
          </div>
        </div>
  
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
          <div class="col-md-10">
            <input class="form-control" type="time" name="start_time" value="<?php echo e($findleagues->start_time); ?>" id="html5-time-input" />
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Uploaded Picture</label>
          <div class="col-md-10">
        <img src="<?php echo e(asset('storage/' . $findleagues->image)); ?>" style="width: 300px; height: auto; object-fit: cover;" alt="Uploaded Image">

          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-time-input" class="col-md-2 col-form-label">Upload Picture</label>
          <div class="col-md-10">
            <input class="form-control" type="file"  name="image"  />
          </div>
  
       </div>
        <button type="submit" class="btn btn-primary">UPDATE</button>
       
      </div>
    </div>

   
  </div>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/content/form-elements/edit-forms-basic-inputs.blade.php ENDPATH**/ ?>