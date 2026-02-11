

<?php $__env->startSection('content'); ?>

<div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">აღსაზრდელი</h1>
    </div>
   </div>
  </div>
 </div>
<section class="content">
 <?php echo Form::model($model, ['route' => 'kindergarteners.store']); ?>

 <?php echo Form::hidden('id', $model->id); ?>

   <div class="card card-primary card-outline card-tabs">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
        <div class="tab-content" id="custom-tabs-three-tabContent">

          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('kids_personal_number', 'ბავშვის პირადობის ნომერი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('kids_personal_number', $model->kids_personal_number, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('kids_first_name', 'ბავშვის სახელი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('kids_first_name', $model->kids_first_name, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('kids_last_name', 'ბავშვის გვარი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('kids_last_name', $model->kids_last_name, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <?php echo Form::label('birth_date', 'დაბადების თარიღი', ['class' => 'awesome']); ?>

                <?php echo Form::date('birth_date', $model->birth_date, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('mother_personal_number', 'დედის პირადობის ნომერი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('mother_personal_number', $model->mother_personal_number, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <?php echo Form::label('mother_first_name', 'დედის სახელი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('mother_first_name', $model->mother_first_name, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('mother_last_name', 'დედის გვარი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('mother_last_name', $model->mother_last_name, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('father_personal_number', 'მამის პირადობის ნომერი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('father_personal_number', $model->father_personal_number, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <?php echo Form::label('father_first_name', 'მამის სახელი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('father_first_name', $model->father_first_name, ['class' => 'form-control']); ?>

              </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <?php echo Form::label('father_last_name', 'მამის გვარი', ['class' => 'awesome']); ?>

                  <?php echo Form::text('father_last_name', $model->father_last_name, ['class' => 'form-control']); ?>

              </div>
            </div>
          </div>

          
          <div class="form-group">
            <?php echo Form::label('mobile_number', 'მობილურის ნომერი', ['class' => 'awesome']); ?>

            <?php echo Form::text('mobile_number', $model->mobile_number, ['class' => 'form-control']); ?>

          </div>

          <div class="form-group">
            <?php echo Form::label('email', 'ელ-ფოსტა', ['class' => 'awesome']); ?>

            <?php echo Form::text('email', $model->email, ['class' => 'form-control']); ?>

          </div>

        </div>       
      </div>

      <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">

        
        <div class="form-group">
          <?php echo Form::label('municipality_id', 'მუნიციპალიტეტი', ['class' => 'awesome']); ?>

          <?php echo Form::select('municipality_id', [], null, ['class' => 'custom-select', 'placeholder' => '--- აირჩიეთ ---', 'id' => 'municipalities']); ?>

        </div>

        
        <div class="form-group">
          <?php echo Form::label('kindergarten_id', 'ბაღის სახელი', ['class' => 'awesome']); ?>

          <?php echo Form::select('kindergarten_id', [], null, ['class' => 'custom-select', 'placeholder' => '--- აირჩიეთ ---', 'id' => 'kindergartens']); ?>

        </div>

        
        <div class="form-group">
          <?php echo Form::label('group_id', 'ასაკი', ['class' => 'awesome']); ?>

          <?php echo Form::select('group_id', $data['group_ranges'], null, ['class' => 'custom-select', 'placeholder' => '--- აირჩიეთ ---']); ?>

        </div>

        
        <div class="form-group">
          <?php echo Form::label('active_status_id', 'აღსაზრდელის სტატუსი', ['class' => 'awesome']); ?>

          <?php echo Form::select('active_status_id', $data['active_statuses'], null, ['class' => 'custom-select']); ?>

        </div>

        
        <div class="card card-primary card-outline card-tabs">
          <div class="card-body">
            <p class="lead"> ინფორმაცია პრივილეგიის შესახებ </p>

            <div class="form-group">
              <?php echo Form::label('priority_id', 'პრივილეგიის სახელი'); ?>

              <?php echo Form::select(
                  'priority_id',
                  $data['priorities'],
                  optional($model->priority)->priority_id,
                  ['class' => 'custom-select', 'placeholder' => '--- აირჩიეთ ---']
              ); ?>

            </div>

            <div class="form-group">
              <?php echo Form::label('has_permission', 'დადასტურებული'); ?>

              <?php echo Form::select(
                  'has_permission',
                  [1 => 'დიახ', 0 => 'არა'],
                  optional($model->priority)->has_permission,
                  ['class' => 'custom-select', 'placeholder' => '--- აირჩიეთ ---']
              ); ?>

            </div>
          </div>
        </div>

      </div>
    </div>

    <button onclick="location.href = '<?php echo e(route('kindergarteners.index')); ?>'" type="button" class="btn btn-danger  btn-block" style="margin-right: 5px;">
      <i class="far fa-window-close"></i> გაუქმება
    </button>
    <button type="submit" class="btn btn-success  btn-block">
      <i class="far fa-paper-plane"></i> გაგზავნა
    </button>

  </div>
</div>
 <?php echo Form::close(); ?>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
  let model = <?php echo json_encode($model, 15, 512) ?>;
  let data = <?php echo json_encode($data, 15, 512) ?>;

  function removeOptions(select) {
    while (select.options.length > 1) { select.remove(1); }
    select.value = "";
  }

  function addOptions(select, options) {
    if (options) options.forEach(function(option) {
      select.options.add(new Option(option.name, option.id));
      if (option.kindergartens && model.id) addOptions(kindergartens, option.kindergartens)
    });
  }

  window.addEventListener('DOMContentLoaded', (event) => {
    let municipalities = document.querySelector('select[id="municipalities"]');
    let kindergartens = document.querySelector('select[id="kindergartens"]');

    addOptions(municipalities, data.municipalities)

    Array.from(municipalities.options).map((item) => {
      if (item.value == model.municipality_id) { item.selected = true }
    });
    Array.from(kindergartens.options).map((item) => {
      if (item.value == model.kindergarten_id) { item.selected = true }
    })
    municipalities.addEventListener('change', (event) => {
      let option = event.target.value
      let municipality = data.municipalities.find((item) => item.id == option);
      removeOptions(kindergartens); addOptions(kindergartens, municipality.kindergartens);

      Array.from(kindergartens.options).map((item) => {
        if (item.value == model.kindergarten_id) { item.selected = true }
      })
    })
  })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mtskhet4/public_html/resources/views/kindergarteners/modify.blade.php ENDPATH**/ ?>