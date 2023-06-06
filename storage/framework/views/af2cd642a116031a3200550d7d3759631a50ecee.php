

<?php $__env->startSection('title', 'Basic Inputs - Forms'); ?>

<?php $__env->startSection('page-script'); ?>
<script src="<?php echo e(asset('assets/js/form-basic-inputs.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Edit /</span> Matches
</h4>

<div class="row">
  
  <form action="<?php echo e(route('update-matches',$findleagues->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="col-xl-8">
      <!-- HTML5 Inputs -->
      <div class="card mb-4">
        <h5 class="card-header">Matches</h5>
        <div class="card-body">
        
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Select League</label>
            <div class="col-md-10">
  
            <select class="select2 form-select form-select-lg" name="league_id" required id="html5-text-input" required data-allow-clear="true">
              <option value="<?php echo e($findleagues->league->id); ?>"><?php echo e($findleagues->league->name); ?></option>

              <?php $__currentLoopData = $allleagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $league): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($league->id); ?>"><?php echo e($league->name); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
             
            </select>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="html5-text-input" class="col-md-2 col-form-label">Home Team</label>
          <div class="col-md-10">
            <input class="form-control" type="text" name="home_team" value="<?php echo e($findleagues->home_team); ?>" required id="html5-text-input" />
          </div>
        </div>
  
  
          <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Away Team</label>
            <div class="col-md-10">
              <input class="form-control" type="text" name="away_team" value="<?php echo e($findleagues->away_team); ?>" required id="html5-text-input" />
            </div>
          </div>
    
          <div class="mb-3 row">
            <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
            <div class="col-md-10">
              <input class="form-control" type="time" name="start_time" value="<?php echo e($findleagues->start_time); ?>"  required id="html5-time-input" />
            </div>
          </div>
          <div class="mb-3 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-10">
              <input class="form-control" type="date" name="date_of_match" value="<?php echo e($findleagues->date_of_match); ?>" id="html5-date-input" />
            </div>
          </div>
           <?php $__currentLoopData = $streamUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               
            <div class="mb-3 row">
              <label for="html5-text-input" class="col-md-2 col-form-label">Live Stream Url</label>
              <div class="col-md-10">
                <input class="form-control" type="text" name="stream_url[]" value="<?php echo e($item); ?>" required id="html5-text-input" />
              </div>
            </div>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <button type="submit" class="btn btn-primary">Update</button>
         
        </div>
      </div>
  
     
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u493167285/domains/totalsporteky.com/public_html/resources/views/content/form-elements/edit_match.blade.php ENDPATH**/ ?>