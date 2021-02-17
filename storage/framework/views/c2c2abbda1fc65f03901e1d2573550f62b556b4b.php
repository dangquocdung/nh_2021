<?php $__env->startSection('title','Static translation'); ?>
<?php $__env->startSection('content'); ?>
<div class="box admin-form-main-block mrg-t-40">
		<div class="box-header with-border">
			<a title="Cancel and go back" href="<?php echo e(url()->previous()); ?>" class=" btn-floating">
				<i class="material-icons">reply</i></a>
			</a>
			<div class="box-title">Static Word Translations for Language: <?php echo e($findlang->name); ?></div>
		</div>

		<div class="box-body">
				
			<div class="callout callout-info">
				<i class="fa fa-info-circle"></i> Update Each Translation Carefully and look for comma (,) also if adding new words else it will cause major errors.
			</div>

			<form action="<?php echo e(route('static.trans.update',$findlang->local)); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<textarea name="transfile" class="form-control" name="" id="" cols="100" rows="20"><?php echo e($file); ?></textarea>
			

		</div>
		<div class="box-footer">

			 <button type="reset" class="btn btn-info"><i class="material-icons left">toys</i> Reset</button>
			
			<button type="submit" class="btn btn-success"><i class="material-icons left">add_to_photos</i> Update</button>

		
		</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/httv/public/uploads/dungthinh/nh_2021/resources/views/admin/language/staticword.blade.php ENDPATH**/ ?>