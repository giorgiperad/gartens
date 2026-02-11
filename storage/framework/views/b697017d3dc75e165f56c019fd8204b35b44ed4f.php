

<?php $__env->startSection('content'); ?>

<?php

function color_picker ($num) {
  
  switch (true) {
    case $num < 20:
        return "danger";
        break;
    case $num > 20 && $num < 37:
        return "warning";
        break;
    case $num > 37:
        return "success";
        break;
  }
}

?>

<div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">ბაღი</h1>
    </div><!-- /.col -->
   </div><!-- /.row -->
  </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">ბაღების ჩამონათვალი</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">          
          <button 
            type="submit" onclick="location.href = '<?php echo e(route('kindergartens.show')); ?>'" class="btn btn-sm btn-outline-success">
              <i class="fas fa-shield-alt"></i> დამატება
          </button>          
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      <table style="text-align:center;" class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>ID</th>
            <th>ბაღი</th>
            <th>მუნიციპალიტეტი</th>
            <th>ადგილი</th>
            <th>შევსებული</th>
            <th>თავისუფალი</th>
            <th>თარიღი</th>
            <th>მოქმედება</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
              $calculater = collect($item->groupAgeRanges);
              $space_length = $calculater->sum('pivot.space_length');
              $space_filled = $calculater->sum('pivot.space_filled');
              $space_free = $calculater->sum('pivot.space_free');
            ?>
           <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->name); ?></td>
            <td><?php echo e($item->municipality->name); ?></td>
            <td><span class="badge badge-<?php echo e(color_picker($space_length)); ?>"><?php echo e($space_length); ?></span></td>
            <td><span class="badge badge-<?php echo e(color_picker($space_filled)); ?>"><?php echo e($space_filled); ?></span></td>
            <td><span class="badge badge-<?php echo e(color_picker($space_free)); ?>"><?php echo e($space_free); ?></span></td>
            <td><?php echo e($item->created_at); ?></td>
            <td>
              <button 
                type="button" 
                class="btn btn-sm btn-success" 
                onclick="location.href = '<?php echo e(route('kindergartens.show', ['id' => $item->id])); ?>'">
                  <i class="fas fa-shield-alt"></i> რედაქტირება
              </button>
              <button 
                type="button" 
                class="btn btn-sm btn-danger"
                data-href="<?php echo e(route('kindergartens.destroy', ['id' => $item->id])); ?>"
                onclick="nottify(event)">
                  <i class="fas fa-shield-alt"></i> წაშლა
              </button>
            </td>
           </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 <!-- /.card-footer-->
</div>
<!-- /.card -->
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script></script>
<?php $__env->stopPush(); ?>









<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u814212997/domains/lightslategray-jackal-229176.hostingersite.com/public_html/resources/views/kindergartens/list.blade.php ENDPATH**/ ?>